<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	

	public function index()
	{

		$apikey='fd4f0fd985453741d1bdee50bd75448a';
		$content = file_get_contents('https://api.themoviedb.org/3/movie/now_playing?api_key='.$apikey.'&language=en-US');

		$result = json_decode ($content);
		$output ='';
			foreach ($result->results as $film)
			{
				$output .='
			
				<div class="col-sm-4">	
					<div class="card ">
					<div class="poster"><img src ="http://image.tmdb.org/t/p/w185'.$film->poster_path.'">

					</div>	
							<div class="details">
							<a href="welcome/insertdb?id='.$film->id.'" class="btn btn-outline-info mb-3" style="width:70px; position:relative;">Add</button>
								<a href="index.php/welcome/detail?id='.$film->id.'">
									<h2>'.$film->title.'</h2></a>
										<span class="badge badge-pill badge-light">'.$film->vote_average.'</span>
								<div class="info">
									<p>'.$film->overview.'</p>
						</div>
					</div>
				  </div>
				</div>
				';

			 }
		$data['hasil'] = $output;
		$this->load->view ('index', $data);

	}
	public function insertdb()
	{
		$id = $_GET ['id'];
		$data = array (
			'mov_id' => $id
		);
		$this->favdb->input_data($data,'fav');
		redirect('#');
	}

	public function fav()
	{
		// Variabels
		$data ['idmovie']= $this->favdb->tampil_data()->result();
		$data ['apikey'] ='fd4f0fd985453741d1bdee50bd75448a';

		// Load Data To View	
		$this->load->view ('fav_v',$data);
		
		}

	public function del(){
		$id = $_GET ['id'];
		$data = array ('mov_id' => $id);

		$this->favdb->hapus($data, 'fav');
		redirect('welcome/fav');
	}

	public function search() 
	{


		$query = $_POST ['query'];
		$apikey='fd4f0fd985453741d1bdee50bd75448a';
		$content = file_get_contents('https://api.themoviedb.org/3/search/movie?api_key='.$apikey.'&language=en-US&query='.$query.'');

		$result = json_decode ($content);
		$output ='';
			foreach ($result->results as $film)
			{
				$output .='
			
				<div class="col-sm-4">
					<div class="card">
						<div class="poster"><img src = "http://image.tmdb.org/t/p/w185'.$film->poster_path.'"></div>
							<div class="details">
								<a href="index.php/welcome/detail?id='.$film->id.'"><h2>'.$film->title.'</h2></a>
										<span class="badge badge-pill badge-light">'.$film->vote_average.'</span>
								<div class="info">
									<p>'.$film->overview.'</p>
						</div>
					</div>
				  </div>
				</div>
				';

			 }
		$data['q'] = $query;
		$data['hasil'] = $output;

		$this->load->view('search_v', $data);
	
	}
	public function upcome()
	{
		
		$apikey='fd4f0fd985453741d1bdee50bd75448a';
		$content = file_get_contents('https://api.themoviedb.org/3/movie/upcoming?api_key='.$apikey.'&language=en-US');

		$result = json_decode ($content);
		$output ='';
			foreach ($result->results as $film)
			{
				$output .='
				<div class="col-sm-4">
					<div class="card">
					
						<div class="poster"><img src = "http://image.tmdb.org/t/p/w185'.$film->poster_path.'">
						
						</div>
						
							<div class="details">
							<a href="welcome/insertdb?id='.$film->id.'" class="btn btn-outline-info mb-3" style="width:70px; position:relative;">Add</button>
								<a href="detail?id='.$film->id.'"><h2>'.$film->title.'</h2></a>
										<span class="badge badge-pill badge-light">'.$film->vote_average.'</span>
								<div class="info">
									<p>'.$film->overview.'</p>
						</div>
					</div>
				  </div>
				</div>
				';

			 }
		$data['hasil'] = $output;

		$this->load->view('upcome_v', $data);
	}
	public function detail()
	{

		$id = $_GET['id'];
		$apikey='fd4f0fd985453741d1bdee50bd75448a';
		$content = file_get_contents('https://api.themoviedb.org/3/movie/'.$id.'?api_key='.$apikey.'&language=en-US');
		$result = json_decode($content);

		// Loop some data
		$genre ='';
		foreach ($result->genres as $g) {
			$genre .='<span class="badge badge-secondary mr-1" style="color:white; font-family:"Arial
			Verdana"; font-size:19px; text-shadow:0.1px 0.1px 0.1px black;">'.$g->name.'</span>';
		}
		$country ='';
		foreach ($result->production_countries as $c) {
			$country .='<kbd class="p mt-3 mr-1 ml-1" style="height:26px;">'.$c->name.'</kbd>';
		}
		$company ='';
		foreach ($result->production_companies as $co){
			$company .='<div class="col-sm-3">
			<div class="card" style="width:200px; height:200px;">
			  <div class="card-body">
			  <img class="card-img-top" src="http://image.tmdb.org/t/p/w185'.$co->logo_path.'" alt="" style="width:200%; margin-top:auto; margin-left:auto; margin-right:auto;">
			  	</div>
				  </div>
				  <h4 class="card-title mt-3 font-weight-bold text-dark" style="">'.$co->name.'</h4>   
						</div>';
		}
		// Variabel
		$data ['co']		= $company;
		$data ['id'] 		= $result->id;
		$data ['country']	= $country;
		$data['duit']		= $result->budget;
		$data['tagline']	= $result->tagline;
		$data['roi']		= $result->revenue;
		$data ['backdrop']	= $result->backdrop_path;
		$data ['poster'] 	= $result->poster_path;
		$data ['title']		= $result->original_title;
		$data ['web']		= $result->homepage;
		$data ['vote']		= $result->vote_average;
		$data ['genre']		= $genre;
		$data ['overview']	= $result->overview;
		$data ['duration']	= $result->runtime;
		$data ['release']	= $result->release_date;
		$data ['status']	= $result->status;
		$data ['populer']	= $result->popularity;
		

		$this->load->view ('detail', $data);
	}
	
}