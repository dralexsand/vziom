<?php

    namespace App\Http\Controllers\Api\v1;

    use App\Http\Controllers\Controller;
    use App\Models\ViewPhone;
    use Database\Seeders\ViewsSeeder;
    use Illuminate\Http\Request;

    class PhonesController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            return $this->getData(20);
        }


        public function getData($per_page)
        {

            /*$seeder = new ViewsSeeder();
            $seeder->run();*/

            //$filter = $request->all();

            $query = new ViewPhone();

            //$query->where('');

            $query = $query->paginate($per_page);

            $pagination_full = $query->toArray();

            $pagination = [
                'current_page' => $pagination_full['current_page'],
                'total' => $pagination_full['total'],
                'from' => $pagination_full['last_page'],
                'to' => $pagination_full['to'],
                'prev_page_url' => $pagination_full['prev_page_url'],
                'next_page_url' => $pagination_full['next_page_url'],
                'path' => $pagination_full['path'],
                'per_page' => $pagination_full['per_page'],
                'last_page' => $pagination_full['last_page'],
                'first_page_url' => $pagination_full['first_page_url'],
                'last_page_url' => $pagination_full['last_page_url'],
            ];

            $query = $query->map(function ($item) {
                return [
                    'last_name' => $item->last_name,
                    'first_name' => $item->first_name,
                    'gender' => $item->gender,
                    'code' => $item->code,
                    'region_id' => $item->region_id,
                    'region' => $item->region,
                    'age' => $item->age,
                    'phone' => $item->phone,
                ];
            });

            $message = [
                'pagination' => $pagination,
                'success' => true,
                'message' => 'successful',
                'data' => $query,
            ];

            return $message;

        }


        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //
        }

        /**
         * Display the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
        }
    }
