<?php

namespace App\Http\Controllers\Front;

use App\Models\Network;
use App\Models\PublicationModel;

class NetworkController extends Controller
{
    public function index()
    {
        $title = '拠点情報';

        $networks = Network::query()
            ->where('status',PublicationModel::TO_PUBLIC)
            ->orderBy('sort', 'asc')
            ->get();

        $building_types = Network::BUILDING_TYPE;
        $headquarters = $building_types[Network::HEADQUARTERS];
        $branch = $building_types[Network::BRANCH];
        $sales_office = $building_types[Network::SALES_OFFICE];
        $factory = $building_types[Network::FACTORY];
        $office = $building_types[Network::OFFICE];

        $network_headquarters = [];
        $network_branches = [];
        $network_sales_offices = [];
        $network_factories = [];
        $network_offices = [];

        foreach ($networks as $network)
        {
            if ($network->building_type === Network::HEADQUARTERS)
            {
                $network_headquarters[] = $network;
            }
            if ($network->building_type === Network::BRANCH)
            {
                $network_branches[] = $network;
            }
            if ($network->building_type === Network::SALES_OFFICE)
            {
                $network_sales_offices[] = $network;
            }
            if ($network->building_type === Network::FACTORY)
            {
                $network_factories[] = $network;
            }
            if ($network->building_type === Network::OFFICE)
            {
                $network_offices[] = $network;
            }
        }
        return view('front/about/network/index', compact('title','headquarters', 'branch', 'sales_office', 'factory', 'office', 'network_headquarters','network_branches','network_sales_offices','network_factories','network_offices'));
    }
}

