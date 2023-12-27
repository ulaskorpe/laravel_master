<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\LaravelRay\Ray;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Company;
use App\Models\PhoneNumber;
use App\Models\User;
use App\Models\Job;
use App\Models\Country;
use App\Models\Video;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //$tagIds=[1,2,3];

        // $posts = Post::where('id','<',1010)->get();
        // foreach($posts as $p ){
        //     $p->tags()->attach($tagIds);
        // }
        // die();
    //   $posts=   DB::table('posts')
    //     ->pluck('title');
      //->select('title' ) ->get()
      //->value('description');
     

    //   DB::transaction(function(){
    //         DB::table('users')->where('id',1)
    //         ->sharedLock()  
    //         //->lockForUpdate()
    //         ->decrement('balance',20);
    //         DB::table('users')->where('id',2)->increment('balance',20);
    //   });

    //   $posts = DB::table('posts')
    //                 ->whereFullText('description','quasi')
    //                 ->get();


                    // $posts = DB::table('posts')
                    // ->select('user_id',DB::raw('AVG(min_to_read) as avg_mtr'))
                    // ->groupByRaw('user_id')
                    // ->get();
        //$posts->addSelect('slug')->get();
    //  return json_encode($posts);

        // $posts = DB::table('posts')
        // ->orderBy('id')
        // ->cursorPaginate();
       // ->simplePaginate(3);
        //->paginate(11,['*'],'p');

 
       $posts = Post::withUserData()
       //->publishedByUser(12)
       ->published()
       ->paginate();
 
        return view('posts',compact('posts'));

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tag::create(['name'=>'Laravel','slug'=>'laravel']);
        // Tag::create(['name'=>'Fight Club','slug'=>'fight-club']);
        // Tag::create(['name'=>'Ulaş Körpe','slug'=>'ulas-korpe']);
        
    //   $company=  Company::create([
    //         'name'=>'KRPSW',
    //         'user_id'=>16
    //     ]);
    //     PhoneNumber::create(['number'=>'+66 666 666','company_id'=>$company->id]);

     
        // Country::create(['name'=>'Netherlands','code'=>'NL']);
        // Country::create(['name'=>'United States','code'=>'USA']);
        // Country::create(['name'=>'Turkiye','code'=>'TR']);
        // Country::create(['name'=>'Russia','code'=>'RU']);
    
    // $user = User::with('posts')->find(16);
    // $user = User::find(16);
    //  $post = Post::find(1000);


    //         $comment = $post->comments()->create(['body'=>fake()->sentence]);

    //         return $comment;

     

    // //$image = $user->image()->create(['url'=>'http://xxx.com/3.jpg']);
    //  $image = $post->image()->create(['url'=>'http://xxx.com/3.jpg']);

    // return $post->image;
    //     $country = Country::find(3);
    // $user->country_id= 3;
    // $user->save();

         //  return $user->companyPhoneNumber()->get();
        
        //  for($i=0;$i<3;$i++){
        //     $job = new Job();
        //     $job->title = fake()->sentence;
        //     $job->description = fake()->sentence;
        //     $job->user_id = $user->id;
        //     $job->active = true;
        //     $job->save();

        //  }
        //return $country->posts  ;
        // $video = Video::create(['title'=>fake()->sentence , 'url'=>fake()->url,'description'=>fake()->paragraph]);
        // $comment = $video->comments()->create(['body'=>fake()->sentence]);

        // return $video->comments;


        

        $postsWithImages = Post::whereHas('image',function($query){
            $query->where('url','like','%jpg%');
        })->get();

        return $postsWithImages;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
