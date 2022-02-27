<?php

namespace App\Models;

use App\Traits\KanaSearch;
use Illuminate\Database\Eloquent\Model;

class PLargePaintKanaSearch extends Model
{
    use KanaSearch {
        KanaSearch::__construct as KanaConstructor;
    }

    public $initial;

    public function __construct(array $requests = [], $searcher = [])
    {
        parent::__construct();
        $this->KanaConstructor();
        $this->requests = collect($requests);

        if(isset($searcher['initial']) && self::$kana_start_regexp->search($searcher['initial'])){
            $this->initial = $searcher['initial'];
        }
    }

    private static function getQueryToPublic()
    {
        return PLarge::query()
            ->published('p_larges.status');
    }

    public function getQuery()
    {
        $query =  self::getQueryToPublic();

        if($this->initial){
            $query->searchKana('product_name_kana', $this->initial);
        }

        return $query;
    }

    public function getProductsPerPage()
    {
        return $this->getQuery()->paginate($this->requests->get('limit') ?? 10)
            ->appends($this->requests->except('page')->toArray());
    }

    public function getKanaCount()
    {
        $kanaCount = PLarge::query()
            ->queryKanaCounts()
            ->getKanaCounts();

        return $kanaCount;
    }
}
