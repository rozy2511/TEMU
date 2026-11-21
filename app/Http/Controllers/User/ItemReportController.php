<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ItemReport;
use App\Services\ItemMatchingService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ItemReportController extends Controller
{
    private const CATEGORIES = [
        'Elektronik',
        'Aksesori',
        'Dokumen',
        'Kunci',
        'Tas',
        'Pakaian',
        'Lainnya',
    ];

    public function index()
    {
        $reports = auth()->user()
            ->itemReports()
            ->with('moderator')
            ->latest()
            ->paginate(10);

        return view('user.reports.index', compact('reports'));
    }

    public function create()
    {
        return view('user.reports.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => [
                'required',
                Rule::in(['lost', 'found']),
            ],
            'item_name' => [
                'required',
                'string',
                'max:255',
            ],
            'category' => [
                'required',
                Rule::in(self::CATEGORIES),
            ],
            'description' => [
                'required',
                'string',
                'min:10',
                'max:3000',
            ],
            'location' => [
                'required',
                'string',
                'max:255',
            ],
            'incident_date' => [
                'required',
                'date',
                'before_or_equal:today',
            ],
            'photo' => [
                Rule::requiredIf($request->input('type') === 'found'),
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ], [
            'type.required' => 'Jenis laporan wajib dipilih.',
            'item_name.required' => 'Nama barang wajib diisi.',
            'category.required' => 'Kategori barang wajib dipilih.',
            'category.in' => 'Kategori barang tidak valid.',
            'description.required' => 'Deskripsi barang wajib diisi.',
            'description.min' => 'Deskripsi minimal 10 karakter.',
            'description.max' => 'Deskripsi maksimal 3000 karakter.',
            'location.required' => 'Lokasi kejadian wajib diisi.',
            'incident_date.required' => 'Tanggal kejadian wajib diisi.',
            'incident_date.before_or_equal' => 'Tanggal kejadian tidak boleh melebihi hari ini.',
            'photo.required' => 'Foto wajib diunggah untuk laporan barang ditemukan.',
            'photo.image' => 'File harus berupa gambar.',
            'photo.mimes' => 'Format foto harus JPG, JPEG, PNG, atau WEBP.',
            'photo.max' => 'Ukuran foto maksimal 2 MB.',
        ]);

        $report = new ItemReport();

        $report->fill([
            'type' => $validated['type'],
            'item_name' => $validated['item_name'],
            'category' => $validated['category'],
            'description' => $validated['description'],
            'location' => $validated['location'],
            'incident_date' => $validated['incident_date'],
        ]);

        if ($request->hasFile('photo')) {
            $report->photo = $request->file('photo')
                ->store('item-reports', 'public');
        }

        $report->user_id = auth()->id();
        $report->status = 'active';
        $report->moderation_status = 'visible';
        $report->save();

        return redirect()
            ->route('user.reports.index')
            ->with('success', 'Laporan berhasil dibuat.');
    }

    public function home(Request $request)
    {
        $query = ItemReport::with('user')
            ->where('status', 'active')
            ->where('moderation_status', 'visible');

        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->where('item_name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('location', 'like', '%' . $search . '%');
            });
        }

        if (
            $request->filled('type') &&
            in_array($request->input('type'), ['lost', 'found'], true)
        ) {
            $query->where('type', $request->input('type'));
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        $reports = $query->latest()
            ->paginate(12)
            ->withQueryString();

        $categories = ItemReport::where('status', 'active')
            ->where('moderation_status', 'visible')
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('user.home', compact('reports', 'categories'));
    }

    public function matches(
        ItemReport $report,
        ItemMatchingService $matchingService
    ) {
        abort_unless($report->user_id === auth()->id(), 403);

        abort_if(
            $report->status !== 'active' ||
            $report->moderation_status !== 'visible',
            404
        );

        $matches = $matchingService->findMatches($report);

        return view('user.reports.matches', compact('report', 'matches'));
    }
}
