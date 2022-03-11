<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = PortfolioCategory::all();
        return view('pages.portfolio.index',compact('categories'));
    }

    public function welcome(){

        $categories = PortfolioCategory::with('portfolios')->get();
        // return $categories;
        return view('welcome',compact('categories'));
    }

     public function view_portfolio(){

        $data = Portfolio::all();
        
        return view('pages.portfolio.view',compact('data'));
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {$categories = PortfolioCategory::all();
        return view('pages.portfolio.create',compact('categories'));
    }

    public function store(Request $request){


        $portfolioData = $request->except('img');

        if ($request->img) {
            $portfolioData['img'] = parse_url($request->img, PHP_URL_PATH);
        }
        
        Portfolio::create($portfolioData);
        return redirect()->route('portfolio.index');

    }
    public function cat_create()
    {
        return view('pages.portfolio.cat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cat_store(Request $request)
    {
        $category_model = new PortfolioCategory();
        $category_model->name = $request->name;
        $category_model->save();
        return redirect()->route('portfolio.index');
    }

    public function cat_destory($id){

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_front($id)
    {

        $output = '';
        $portfolioData = Portfolio::where('id',$id)->with('category')->first();
        
        $output .= '
        <div class="single-work">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-10 offset-md-1 mb-40">
                    <h1 class="title mb-30">'.$portfolioData->name.'</h1>
                    <p class="mb-30">'.$portfolioData->description.'</p>
                    <ul class="information">
                     
                        <li><span class="title">Website:</span><a  href="'.$portfolioData->link.'" target="_blank"> Click here to view </a></li>
                        <li><span class="title">Category:</span>'.$portfolioData->category->name.'</li>
                    </ul>

                    <figure class="mt-30"><img class="thumbnail img-slide" src="'.$portfolioData->img.'" alt=""></figure>
                </div>
            </div>
        </div>
    </div>
        ';
        echo json_encode($output);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolioData = Portfolio::where('id',$id)->first();
        $categories = PortfolioCategory::all();
        return view('pages.portfolio.edit',compact('portfolioData','categories'));
        
    }
    public function cat_edit($id)
    {
        $catData = PortfolioCategory::where('id',$id)->first();
        // $categories = PortfolioCategory::all();
        return view('pages.portfolio.cat.edit',compact('catData'));
        
    }

    public function portfolio_cat_update(Request $request, $id)
    {
       
        $catModel = PortfolioCategory::where('id',$id)->first();
        // dd($catModel);
        $catModel->name = $request->name;
        $catModel->save();
        return redirect()->route('portfolio.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $portfolioModel = Portfolio::find($id);

        $portfolioData = $request->except('img');

        if ($request->img) {

            $portfolioData['img'] = parse_url($request->img, PHP_URL_PATH);
        }
        
        $portfolioModel->update($portfolioData);
        return redirect()->route('portfolio.index');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
