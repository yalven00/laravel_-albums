<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Collection;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;



class AlbumsController extends Controller
{
  
    public function __invoke()
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('object', 'LIKE', "%{$value}%")
                        ->orWhere('city', 'LIKE', "%{$value}%");
                });
            });
        });
        $albums = QueryBuilder::for(Album::class)
        ->defaultSort('object')
        ->allowedSorts(['object', 'city'])
        ->allowedFilters(['object', 'city', $globalSearch])
        ->paginate(4)
        ->withQueryString();

        return Inertia::render('Albums/Index', ['albums' => $albums])->table(function (InertiaTable $table) {
            $table->column('id', 'ID', searchable: true, sortable: true);
            $table->column('object', 'Object', searchable: true, sortable: true);
            $table->column('city', 'City', searchable: true, sortable: true);
            $table->column('created_at', 'Date', searchable: true, sortable: true);
        });
    }


}
