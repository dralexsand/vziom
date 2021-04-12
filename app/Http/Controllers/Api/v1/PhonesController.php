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

        }


        public function getFilteredData(GetFilterDataRequest $request)
        {

            /*$seeder = new ViewsSeeder();
            $seeder->run();*/

            $filter = $request->all();

            //$query = DB::table('v_bios');
            $query = new ViewPhone();

            $query->where('');

            $process = 0;

            if (isset($filter['id'])) {
                $id = $filter['id'];
                $query = $query->where('v_bios.user_id', '=', $id);
                $process = 1;
            }

            if ($process == 0) {

                if (isset($filter['gender'])) {
                    $gender = $filter['gender'];

                    if (in_array($gender, ['male', 'female'])) {
                        $query = $query->where('v_bios.gender', '=', $gender);
                    }
                }

                if (isset($filter['last_name'])) {
                    $term = $filter['last_name'];
                    $query = $query->where('v_bios.last_name', 'LIKE', '%' . $term . '%');
                }

                if (isset($filter['first_name'])) {
                    $term = $filter['first_name'];
                    $query = $query->where('v_bios.first_name', 'LIKE', '%' . $term . '%');
                }

                if (isset($filter['age']) && isset($filter['birthday'])) {
                    $t = strtotime($filter['birthday']);
                    $term = date('Y-m', $t);
                    $query = $query->where('v_bios.birthday', 'LIKE', '%' . $term . '%');

                } elseif (isset($filter['birthday'])) {

                    $t = strtotime($filter['birthday']);
                    $term = date('Y', $t);
                    $query = $query->where('v_bios.birthday', 'LIKE', '%' . $term . '%');

                } elseif (isset($filter['age'])) {
                    $term = $filter['age'];
                    $query = $query->where('v_bios.age', '=', $term);
                }

            }

            $query = $query->select(
                'v_bios.last_name', 'v_bios.first_name', 'v_bios.age', 'v_bios.birthday', 'v_bios.short_bio',
                'v_bios.gender', 'v_bios.user_id', 'v_bios.bio'
            )
                //->get();
                ->paginate(5);

            $paging_full = $query->toArray();

            $pagination = [
                'current_page' => $paging_full['current_page'],
                'total' => $paging_full['total'],
                'from' => $paging_full['last_page'],
                'to' => $paging_full['to'],
                'prev_page_url' => $paging_full['prev_page_url'],
                'next_page_url' => $paging_full['next_page_url'],
                'path' => $paging_full['path'],
                'per_page' => $paging_full['per_page'],
                'last_page' => $paging_full['last_page'],
                'first_page_url' => $paging_full['first_page_url'],
                'last_page_url' => $paging_full['last_page_url'],
            ];

            $query = $query->map(function ($item) {
                return [
                    'user_id' => $item->user_id,
                    'gender' => $item->gender,
                    'last_name' => $item->last_name,
                    'first_name' => $item->first_name,
                    'birthday' => $item->birthday,
                    'age' => $item->age,
                    'photos' => Photo::getPhotoByUser($item->user_id),
                    'videos' => Video::getVideoByUser($item->user_id),
                    'short_bio' => $item->short_bio,
                    'bio' => $item->bio,
                ];
            });

            $message = [
                'paging' => $pagination,
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
