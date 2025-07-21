<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->helper('nav');
		$this->redirectOldUrls();
	}
	
	public function redirectOldUrls() {
    $requested_url = current_url();
    $parsed_url = parse_url($requested_url);
    $path = isset($parsed_url['path']) ? $parsed_url['path'] : '';
	if ($path === '/importance_of_training') {
    redirect(base_url('importance-of-training'), 'location', 301);
} elseif ($path === '/custom_fire_scenes') {
    redirect(base_url('custom-fire-scenes'), 'location', 301);
} elseif ($path === '/training_support') {
    redirect(base_url('training-support'), 'location', 301);
} elseif ($path === '/fire_simulators') {
    redirect(base_url('fire-simulators'), 'location', 301);
}
elseif ($path === '/about_us') {
    redirect(base_url('about-us'), 'location', 301);
}
elseif ($path === '/contact_us') {
    redirect(base_url('contact-us'), 'location', 301);
}
}

	public function index()
	{

		$data['banner_video'] = $this->db->select('*')->from('banner_video')->get()->row();
		$data['gallery'] = $this->db->select('*')->from('gallery')->get()->result();
		$data['services'] = $this->db->select('*')->from('services')->get()->result();
		$data['testimonials'] = $this->db->select('*')->from('testimonial')->get()->result();
		$data['benefit_offer'] = $this->db->select('*')->from('benefit_offer')->get()->row();
		$data['benefit_list'] = $this->db->select('*')->from('benefit_list')->get()->result();
		$data['unique_features'] = $this->db->select('*')->from('unique_features')->get()->result();
		$data['partners'] = $this->db->select('*')->from('partners')->get()->result();
		$data['simulator_showroom'] = $this->db->select('*')->from('simulator_showroom')->get()->result();
		$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
		$data['pyrosoft_images'] = $this->db->select('*')->from('pyrosoft_images')->get()->result();
		$data['pyrosoft_way'] = $this->db->select('*')->from('pyrosoft_way')->get()->row();
		$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Home')->get()->row();
		$this->load->view('pyrosoft/includes/header', $header);
		$this->load->view('pyrosoft/index',$data);
		$this->load->view('pyrosoft/includes/footer');
	}

	// public function corporate_history()
	// {
	// 	$data['corporate_history'] = $this->db->select('*')->from('corporate_history')->get()->row();
	// 	$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
	// 	$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Corporate History')->get()->row();
	// 	$this->load->view('pyrosoft/includes/header', $header);
	// 	$this->load->view('pyrosoft/corporate-history',$data);
	// 	$this->load->view('pyrosoft/includes/footer');
	// }

	// public function president_message()
	// {
	// 	$data['president_message'] = $this->db->select('*')->from('president_message')->get()->row();
	// 	$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
	// 	$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'President Message')->get()->row();
	// 	$this->load->view('pyrosoft/includes/header', $header);
	// 	$this->load->view('pyrosoft/president-message',$data);
	// 	$this->load->view('pyrosoft/includes/footer');
	// }

	public function office()
	{
		$data['office'] = $this->db->select('*')->from('office')->get()->row();
		$data['office_images'] = $this->db->select('*')->from('office_images')->get()->result();
		$data['office_category'] = $this->db->select('*')->from('office_category')->get()->result();
		$data['office_series'] = $this->db->select('*')->from('office_series')->get()->result();
		$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
		$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Office')->get()->row();
		$this->load->view('pyrosoft/includes/header', $header);
		$this->load->view('pyrosoft/office',$data);
		$this->load->view('pyrosoft/includes/footer');
	}

	public function industrial()
	{
		$data['industrial'] = $this->db->select('*')->from('industrial')->get()->row();
		$data['industrial_images'] = $this->db->select('*')->from('industrial_images')->get()->result();
		$data['industrial_category'] = $this->db->select('*')->from('industrial_category')->get()->result();
		$data['industrial_series'] = $this->db->select('*')->from('industrial_series')->get()->result();
		$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
		$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Industrial')->get()->row();
		$this->load->view('pyrosoft/includes/header' , $header);
		$this->load->view('pyrosoft/industrial',$data);
		$this->load->view('pyrosoft/includes/footer');
	}

	public function enterprise()
	{
		$data['enterprise'] = $this->db->select('*')->from('enterprise')->get()->row();
		$data['enterprise_images'] = $this->db->select('*')->from('enterprise_images')->get()->result();
		$data['enterprise_category'] = $this->db->select('*')->from('enterprise_category')->get()->result();
		$data['enterprise_series'] = $this->db->select('*')->from('enterprise_series')->get()->result();
		$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
		$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Enterprise')->get()->row();
		$this->load->view('pyrosoft/includes/header', $header);
		$this->load->view('pyrosoft/enterprise',$data);
		$this->load->view('pyrosoft/includes/footer');
	}
	
	

	public function rent()
	{
		$data['rent'] = $this->db->select('*')->from('rent')->get()->row();
		$data['rent_list'] = $this->db->select('*')->from('rent_list')->get()->result();
		$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
		$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Rent')->get()->row();
		$this->load->view('pyrosoft/includes/header', $header);
		$this->load->view('pyrosoft/rent',$data);
		$this->load->view('pyrosoft/includes/footer');
	}

	public function lease()
	{
		$data['lease'] = $this->db->select('*')->from('lease')->get()->row();
		$data['lease_list'] = $this->db->select('*')->from('lease_list')->get()->result();
		$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
		$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Lease')->get()->row();
		$this->load->view('pyrosoft/includes/header', $header);
		$this->load->view('pyrosoft/lease',$data);
		$this->load->view('pyrosoft/includes/footer');
	}

	public function purchase()
	{
		$data['purchase'] = $this->db->select('*')->from('purchase')->get()->row();
		$data['purchase_list'] = $this->db->select('*')->from('purchase_list')->get()->result();
		$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
		$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Purchase')->get()->row();
		$this->load->view('pyrosoft/includes/header', $header);
		$this->load->view('pyrosoft/purchase',$data);
		$this->load->view('pyrosoft/includes/footer');
	}

	public function training_support()
	{
		$data['training'] = $this->db->select('*')->from('training')->get()->row();
		$data['training_list'] = $this->db->select('*')->from('training_list')->get()->result();
		$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
		$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Training Support')->get()->row();
		$this->load->view('pyrosoft/includes/header', $header);
		$this->load->view('pyrosoft/training-support',$data);
		$this->load->view('pyrosoft/includes/footer');
	}

	public function importance_of_training()
	{
		$data['imp_training'] = $this->db->select('*')->from('imp_training')->get()->row();
		$data['imp_training_list'] = $this->db->select('*')->from('imp_training_list')->get()->result();
		$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
		$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Importance of Training')->get()->row();
		$this->load->view('pyrosoft/includes/header', $header);
		$this->load->view('pyrosoft/importance-of-training',$data);
		$this->load->view('pyrosoft/includes/footer');
		
	}

	public function custom_fire_scenes()
	{
		$data['custom_fire'] = $this->db->select('*')->from('custom_fire')->get()->result();
		$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
		$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Custom Fire Scenes')->get()->row();
		$data['custom_fire_head_desc'] = $this->db->select('*')->from('custom_fire_head_desc')->get()->row();
		$this->load->view('pyrosoft/includes/header', $header);
		$this->load->view('pyrosoft/custom-fire-scenes',$data);
		$this->load->view('pyrosoft/includes/footer');
	}

	public function about_us()
	{
		$data['about_us'] = $this->db->select('*')->from('about_us')->get()->row();
		$data['about_us_cols'] = $this->db->select('*')->from('about_us_cols')->get()->result();
		$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
		$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'About Us')->get()->row();
		$this->load->view('pyrosoft/includes/header', $header);
		$this->load->view('pyrosoft/about-us',$data);
		$this->load->view('pyrosoft/includes/footer');
	}

	public function services()
	{
		$data['our_service'] = $this->db->select('*')->from('our_service')->get()->row();
		$data['services'] = $this->db->select('*')->from('services')->get()->result();
		$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
		$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Services')->get()->row();
		$this->load->view('pyrosoft/includes/header', $header);
		$this->load->view('pyrosoft/services',$data);
		$this->load->view('pyrosoft/includes/footer');
	}

	public function contact_us()
	{
		$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
		$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Contact Us')->get()->row();
		$this->load->view('pyrosoft/includes/header', $header);
		$this->load->view('pyrosoft/contact-us',$data);
		$this->load->view('pyrosoft/includes/footer');

	}

	public function no_index_form()
	{
		$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
		$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Pyrosoft Customer Information')->get()->row();
		$this->load->view('pyrosoft/includes/header', $header);
		$this->load->view('pyrosoft/nonindex-form.php',$data);
		$this->load->view('pyrosoft/includes/footer');

	}


	//added on 16-06-2025
	public function new_no_index_form()
	{
		$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
		$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Pyrosoft Customer Information')->get()->row();
		$this->load->view('pyrosoft/includes/header', $header);
		$this->load->view('pyrosoft/new_noindex-form.php',$data);
		$this->load->view('pyrosoft/includes/footer');

	}
	

	public function fire_simulators()
	{
		$data['office_category'] = $this->db->select('*')->from('office_category')->order_by("id", "ASC")->limit(2)->get()->result();
		$data['industrial_category'] = $this->db->select('*')->from('industrial_category')->order_by("id", "ASC")->limit(2)->get()->result();
		$data['enterprise_category'] = $this->db->select('*')->from('enterprise_category')->order_by("id", "ASC")->limit(2)->get()->result();
		$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
		$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Fire Simulators')->get()->row();
		$data['fire_simulator'] = $this->db->select('*')->from('fire_simulator')->order_by("id", "ASC")->get()->result();
		$this->load->view('pyrosoft/includes/header', $header);
		$this->load->view('pyrosoft/fire-simulators',$data);
		$this->load->view('pyrosoft/includes/footer');
	}

	public function privacy()
	{
		$data['privacy'] = $this->db->select('*')->from('privacy')->get()->row();
		$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
		$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Privacy')->get()->row();
		$this->load->view('pyrosoft/includes/header', $header);
		$this->load->view('pyrosoft/privacy',$data);
		$this->load->view('pyrosoft/includes/footer');
	}

	public function faq()
	{
		$data['faq'] = $this->db->select('*')->from('faq')->get()->result();
		$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
		$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Faq')->get()->row();
		$this->load->view('pyrosoft/includes/header', $header);
		$this->load->view('pyrosoft/faq',$data);
		$this->load->view('pyrosoft/includes/footer');
	}

	// public function fire_extinguisher_benefits()
	// {
	// 	$data['fire_extinguisher'] = $this->db->select('*')->from('fire_extinguisher')->get()->row();
	// 	$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
	// 	$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Fire Extinguisher Benefits')->get()->row();
	// 	$this->load->view('pyrosoft/includes/header', $header);
	// 	$this->load->view('pyrosoft/fire-extinguisher-benefits',$data);
	// 	$this->load->view('pyrosoft/includes/footer');
	// }

		public function contact()
	{
		// echo "You are not in contact form";
		 //echo "<pre>"; print_r($_POST); die();
	    //date_default_timezone_set("Canada/Eastern");
		date_default_timezone_set("America/Toronto");

		// $_POST['created_at'] = date('Y-m-d h:m:s');
		// $_POST['updated_at'] = date('Y-m-d h:m:s');
		$_POST['created_at'] = date('Y-m-d H:i:s');
		$_POST['updated_at'] = date('Y-m-d H:i:s');

		//'currency'       => ($this->input->post('currency_toggle') === 'USD') ? 'USD' : 'CAD',
 		//$_POST['currency'] = ($this->input->post('currency_toggle') === 'USD') ? 'USD' : 'CAD';

		$currency = $this->input->post('currency') ?? 'USD';
		$_POST['currency'] = $currency;


		if($_POST['email'] == ''){
			echo "error";
		}
		if($_POST['company'] == ''){
			echo "error";
		}
		if($_POST['is_purchase'] == ''){
			echo "error";
		}
 		if($_POST['email'] != "" && $_POST['company'] != '' && $_POST['is_purchase'] != '') {

				$googleFormUrl = 'https://docs.google.com/forms/d/e/1FAIpQLSe8z0rE4tIvx3rkCUu0_Rys6cZtpIhWzl8i-65F8glFeVSzcQ/formResponse';
					$data = array(
						'entry.420271616' => !empty($_POST['first_name']) ? ucfirst($_POST['first_name']) : 'NA',
						'entry.519284321' => !empty($_POST['last_name']) ? $_POST['last_name'] : 'NA',
						'entry.64784771' => !empty($_POST['company']) ? $_POST['company'] : 'NA',
						'entry.1511606948' => !empty($_POST['is_purchase']) ? ucfirst($_POST['is_purchase']): 'NA',
						'entry.881313608' => !empty($_POST['email']) ? $_POST['email'] : 'NA',
						'entry.1345695974' => !empty($_POST['mobile']) ? $_POST['mobile'] : '',
						'entry.23979842' => !empty($_POST['comments']) ? $_POST['comments'] : '',
						//'entry.222892141' => !empty($_POST['comments']) ? $_POST['comments'] : '',
						'entry.222892141' => !empty($_POST['currency']) ? $_POST['currency'] : 'USD',
						'entry.1067849557' => !empty($_POST['position']) ? $_POST['position'] : '',
					);
					

					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $googleFormUrl);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
					
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_FAILONERROR, true);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						'Content-Type: application/x-www-form-urlencoded',  // Form data
						'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3'
					));
					$result = curl_exec($ch);
					

					curl_close($ch);
					
			
					// <tr>
					// 	<th>Address</th> <td>".$_POST['address']." </td>
					// 	</tr>
					// <tr>
					// 	<th>Contact</th> <td>".$_POST['mobile']." </td>
					// 	</tr>
						
	 if ($this->db->insert('contact_us', $_POST)) {

		//$to = "matthew@pyrosoftinc.com, kelly@pyrosoftinc.com, kerry@pyrosoftinc.com, leads@pyrosoftinc.com";
		//$to = "ravi.bhushan@infoicon.in, avinash.kumar@infoicon.in";
		if($_POST['is_purchase'] == 'rental'){
			$to = "rentals@pyrosoft.ca, matthew@pyrosoftinc.com, kelly@pyrosoftinc.com, kerry@pyrosoftinc.com, leads@pyrosoftinc.com";
		}else{
			$to = "matthew@pyrosoftinc.com, kelly@pyrosoftinc.com, kerry@pyrosoftinc.com, leads@pyrosoftinc.com";
		}
		$subject = "Pyrosoft Contact Us";
						$message = "
						<html>
						<head>
						<title>Pyrosoft Contact Us</title>
						</head>
						<body>
							<p>Time:".date("h:i:sa")."</p>
							<p>Date:".date("Y/m/d")."</p>
						<p style='text-align:center'><h3>Pyrosoft Contact Us!</h3></p>
						<table style='border:1px solid; width:100%; padding:10px' border='1px solid'>
						<tr>
						<th>Name</th> <td>".ucfirst($_POST['first_name'])." ".$_POST['last_name']." </td>
						</tr>
						
						<tr>
						<th>Email</th> <td>".$_POST['email']." </td>
						</tr>
						<tr>
						<th>Company</th> <td>".$_POST['company']." </td>
						</tr>
						<tr>
						<th>Position</th> <td>".$_POST['position']." </td>
						</tr>
						
						<tr>
						<th>Are you interested in Purchase or Rental information ?</th> <td>".$_POST['is_purchase']." </td>
						</tr>
						 <tr>
							<th>Request pricing</th> <td>".$currency." </td>
						</tr>

						<tr>
						<th>Message</th> <td>".$_POST['comments']." </td>
						</tr>
						</table>
						</body>
						</html>
						";

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: <no-reply@pyrosoftinc.com>';

				mail($to,$subject,$message,$headers);

			echo "done";
		} else {
			echo "error";
		}
		 }
	}

public function thanks()
	{
		//$data['faq'] = $this->db->select('*')->from('faq')->get()->result();
		//$data['rand_no'] = "";
		$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
		$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Thanks')->get()->row();
		//$data['rand_no'] =rand(111111, 999999);
		$this->load->view('pyrosoft/includes/header', $header);
		$this->load->view('pyrosoft/thanks', $data);
		$this->load->view('pyrosoft/includes/footer');
	}

public function thanks_information()
	{
		$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
		$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Thanks')->get()->row();
		$this->load->view('pyrosoft/includes/header', $header);
		$this->load->view('pyrosoft/thanks_information', $data);
		$this->load->view('pyrosoft/includes/footer');
	}

public function errorpage(){
		//$this->load->view('pyrosoft/error404');
		$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
		$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Page Not Found')->get()->row();
		$this->load->view('pyrosoft/includes/header', $header);
		$this->load->view('pyrosoft/error404', $data);
		$this->load->view('pyrosoft/includes/footer');
	}

	public function noindexform()
		{
			
			
			if($_POST['first_name'] == ''){
				echo "error";
			}
			if($_POST['last_name'] == ''){
				echo "error";
			}
			if($_POST['position'] == ''){
				echo "error";
			}
			if($_POST['email'] == ''){
				echo "error";
			}else {
				if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
					echo "error";
				}
			}
			if($_POST['ship_to_phone'] == ''){
				echo "error";
			}else {
				if (!preg_match('/^[0-9]+$/', $_POST['ship_to_phone'])) {
					echo "error";
				}
			}


			if($_POST['bill_to_address'] == ''){
				echo "error";
			}
			if($_POST['bill_to_contact'] == ''){
				echo "error";
			}
			if($_POST['invoice_mail'] == ''){
				echo "error";
			}else {
				if (!filter_var($_POST['invoice_mail'], FILTER_VALIDATE_EMAIL)) {
					echo "error";
				}
			}
			if($_POST['accounting_phone'] == ''){
				echo "error";
			}else {
				if (!preg_match('/^[0-9]+$/', $_POST['accounting_phone'])) {
					echo "error";
				}
			}
			if($_POST['order_number'] == ''){
				echo "error";
			}
 			// if($_POST['email'] != "" && $_POST['company'] != '' && $_POST['is_purchase'] != '') {

			

				$googleFormUrl = 'https://docs.google.com/forms/d/e/1FAIpQLScgVYHMZomnXE9Bl-Mfh89yJQZDZHz-hvXm0hIZHraFm4OQXQ/formResponse';
					$data = array(
						'entry.1452872288' => !empty($_POST['first_name']) ? ucfirst($_POST['first_name']) : 'NA',
						'entry.1080953820' => !empty($_POST['last_name']) ? $_POST['last_name'] : 'NA',
						'entry.369846785' => !empty($_POST['position']) ? $_POST['position'] : 'NA',
						'entry.1660000371' => !empty($_POST['email']) ? $_POST['email'] : 'NA',
						'entry.1802752988' => !empty($_POST['ship_to_phone']) ? $_POST['ship_to_phone'] : 'NA',
						'entry.1208202308' => !empty($_POST['ship_to_alternate_phone']) ? $_POST['ship_to_alternate_phone'] : 'NA',
						'entry.1503687031' => !empty($_POST['ship_to_fax']) ? $_POST['ship_to_fax'] : 'NA',
						'entry.986106737' => !empty($_POST['bill_to_address']) ? $_POST['bill_to_address'] : 'NA',
						'entry.878455775' => !empty($_POST['bill_to_contact']) ? $_POST['bill_to_contact'] : 'NA',
						'entry.1702840964' => !empty($_POST['invoice_mail']) ? $_POST['invoice_mail'] : 'NA',
						'entry.113841084' => !empty($_POST['accounting_phone']) ? $_POST['accounting_phone'] : 'NA',
						'entry.2042381758' => !empty($_POST['order_number']) ? $_POST['order_number'] : 'NA',
						'entry.1330870486' => !empty($_POST['accounting_fax']) ? $_POST['accounting_fax'] : 'NA',

					);
					

					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $googleFormUrl);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
					//curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_FAILONERROR, true);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						'Content-Type: application/x-www-form-urlencoded',  // Form data
						'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3'
					));
					$result = curl_exec($ch);
					curl_close($ch);

				// }
				echo "done";
			}



		//added on 16-06-2025
		public function new_noindexform()
		{
			
			
			if($_POST['first_name'] == ''){
				echo "error";
			}
			if($_POST['last_name'] == ''){
				echo "error";
			}
			if($_POST['company'] == ''){
				echo "error";
			}
			if($_POST['email'] == ''){
				echo "error";
			}else {
				if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
					echo "error";
				}
			}
			if($_POST['ship_to_phone'] == ''){
				echo "error";
			}else {
				if (!preg_match('/^[0-9]+$/', $_POST['ship_to_phone'])) {
					echo "error";
				}
			}


			// if($_POST['bill_to_address'] == ''){
			// 	echo "error";
			// }
			// if($_POST['bill_to_contact'] == ''){
			// 	echo "error";
			// }
			if($_POST['invoice_mail'] == ''){
				echo "error";
			}else {
				if (!filter_var($_POST['invoice_mail'], FILTER_VALIDATE_EMAIL)) {
					echo "error";
				}
			}
			if($_POST['accounting_phone'] == ''){
				echo "error";
			}else {
				if (!preg_match('/^[0-9]+$/', $_POST['accounting_phone'])) {
					echo "error";
				}
			}
			if($_POST['order_number'] == ''){
				echo "error";
			}
 			
				$googleFormUrl = 'https://docs.google.com/forms/d/e/1FAIpQLSccVDIZMYdUGWZor4XajaQKYtnrlOGwb1zonW_uU5qxrTTEBA/formResponse';
				//$googleFormUrl = 'https://docs.google.com/forms/d/e';
					$data = array(
						'entry.1115601842' => !empty($_POST['first_name']) ? ucfirst($_POST['first_name']) : 'NA',
						'entry.1056810688' => !empty($_POST['last_name']) ? $_POST['last_name'] : 'NA',
						'entry.1653379992' => !empty($_POST['company']) ? $_POST['company'] : 'NA',
						'entry.994843882' => !empty($_POST['email']) ? $_POST['email'] : 'NA',
						'entry.1657070995' => !empty($_POST['ship_to_phone']) ? $_POST['ship_to_phone'] : 'NA',
						'entry.1709175609' => !empty($_POST['ship_to_alternate_phone']) ? $_POST['ship_to_alternate_phone'] : 'NA',

						'entry.1119466274' => !empty($_POST['ship_to_delivery_note']) ? $_POST['ship_to_delivery_note'] : 'NA',
						'entry.1203526702' => !empty($_POST['ship_to_address']) ? $_POST['ship_to_address'] : 'NA',
						'entry.483090483' => !empty($_POST['ship_to_city']) ? $_POST['ship_to_city'] : 'NA',
						'entry.421675179' => !empty($_POST['ship_to_state']) ? $_POST['ship_to_state'] : 'NA',
						'entry.928326802' => !empty($_POST['ship_to_zip']) ? $_POST['ship_to_zip'] : 'NA',
						'entry.1753528099' => !empty($_POST['ship_to_country']) ? $_POST['ship_to_country'] : 'NA',

						'entry.178074503' => !empty($_POST['bill_to_address']) ? $_POST['bill_to_address'] : 'NA',
						'entry.493144524' => !empty($_POST['bill_to_city']) ? $_POST['bill_to_city'] : 'NA',
						'entry.1918881854' => !empty($_POST['bill_to_state']) ? $_POST['bill_to_state'] : 'NA',
						'entry.1196058863' => !empty($_POST['bill_to_zip']) ? $_POST['bill_to_zip'] : 'NA',
						'entry.710628939' => !empty($_POST['bill_to_country']) ? $_POST['bill_to_country'] : 'NA',
						
						'entry.1868543666' => !empty($_POST['accounting_contact']) ? $_POST['accounting_contact'] : 'NA',
						'entry.1328034170' => !empty($_POST['invoice_mail']) ? $_POST['invoice_mail'] : 'NA',
						'entry.655916853' => !empty($_POST['accounting_phone']) ? $_POST['accounting_phone'] : 'NA',
						'entry.145938741' => !empty($_POST['order_number']) ? $_POST['order_number'] : 'NA',
						

					);
					

					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $googleFormUrl);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
					
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_FAILONERROR, true);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						'Content-Type: application/x-www-form-urlencoded', 
						'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3'
					));

					$result = curl_exec($ch);
					curl_close($ch);




					$CompanyName = "Puyrosoft";          // your Input Value
					$ShipToAddress = !empty($_POST['ship_to_address']) ? $_POST['ship_to_address'] : 'NA';     // your Input Value
					$ShipToName = !empty($_POST['first_name']) ? ucfirst($_POST['first_name']) : 'NA';           // your Input Value
					$ShipToEmail = !empty($_POST['email']) ? $_POST['email'] : 'NA';         // your Input Value
					$ShiptoPhoneNumber = !empty($_POST['ship_to_phone']) ? $_POST['ship_to_phone'] : 'NA';
					$ShipToAlternatePhoneNumber = !empty($_POST['ship_to_alternate_phone']) ? $_POST['ship_to_alternate_phone'] : 'NA';
					$ShipToFax = 'NA';
					$BilltoAddress = !empty($_POST['bill_to_address']) ? $_POST['bill_to_address'] : 'NA';
					$AccountingInvoiceEmail = !empty($_POST['invoice_mail']) ? $_POST['invoice_mail'] : 'NA';
					$BillToEmail = !empty($_POST['email']) ? $_POST['email'] : 'NA';
					$AccountingPhoneNumber = !empty($_POST['accounting_phone']) ? $_POST['accounting_phone'] : 'NA';
					//$AccountingPhoneNumber = [!empty($_POST['accounting_phone']) ? $_POST['accounting_phone'] : 'NA'];
					$PurchaseOrderNumberorreference = !empty($_POST['order_number']) ? $_POST['order_number'] : 'NA';
					$AccountingFax = 'N/A';

					// print_r($CompanyName);
					// print_r($ShipToAddress);
					// print_r($PurchaseOrderNumberorreference);

					$leadData = [
						"firstName" => !empty($_POST['first_name']) ? ucfirst($_POST['first_name']) : 'NA',
						"lastName" => !empty($_POST['last_name']) ? $_POST['last_name'] : 'NA',
						"jobTitle" => "N/A",
						"waytoContact" => !empty($_POST['email']) ? $_POST['email'] : 'NA',
						"leadRank" => "1",               
						"leadRankMeaning" => "High",     
						"leadStatus" => "4",            
						"leadStatusMeaning" => "Converted",            
						"leadSource" => "NEW_CONTACT_FORM",            
						"leadSourceMeaning" => "NEW_CONTACT_FORM",      
						"leadTypeId" => "58873",                        
						"leadTypeName" => "Existing Business",          
						"assigneeObjectRefId" => 316889671,             
						"assigneeObjectRefName" => "",                  
						"assigneeObjectId" => 8,

						"phoneNumbers" => [

							[
								"id" => "lead_phone_input",
								"phoneNumber" => !empty($_POST['ship_to_phone']) ? $_POST['ship_to_phone'] : 'NA',              // Update value based on your firm
								"phoneType" => "Business",
								"phoneTypeCode" => "PHONE_BUSINESS"
							]

						],

						"emailAddresses" => [

							[
								"id" => "cont_email_input",
								"emailAddress" => !empty($_POST['email']) ? $_POST['email'] : 'NA',             // Update value based on your firm
								"emailTypeCode" => "BUSINESS",
								"emailType" => "Business"
							]

						],
						"labels" => [],
						"addresses" => [],
						"customAttributes" => [
							[
							"customAttributeId"=> "input_4_18",
							"customAttributeValue" => $CompanyName,
							"customAttributeType"=> "input",
							"customAttributeTagName" => "input_1736437446162_473_1048051736437446162_827",
							"customAttributeName" => "input_1736437446162_473_1048051736437446162_827",
							"input_1736437446162_473_1048051736437446162_827"=> $CompanyName
							],
							[
							"customAttributeId" => "input_4_19",
							"customAttributeValue" => $ShipToAddress,
							"customAttributeType" => "input",
							"customAttributeTagName" => "input_1736438268599_75_1038701736438268599_979",
							"customAttributeName" => "input_1736438268599_75_1038701736438268599_979",
							"input_1736438268599_75_1038701736438268599_979" => $ShipToAddress
							],
							[
							"customAttributeId" => "input_4_20",
							"customAttributeValue" => $ShipToName,
							"customAttributeType" => "input",
							"customAttributeTagName" => "input_1736438287334_423_926161736438287334_361",
							"customAttributeName" => "input_1736438287334_423_926161736438287334_361",
							"input_1736438287334_423_926161736438287334_361" => $ShipToName
							],
							[
							"customAttributeId" => "input_4_21",
							"customAttributeValue" => $ShipToEmail,
							"customAttributeType" => "input",
							"customAttributeTagName" => "input_1736438289786_180_869451736438289786_584",
							"customAttributeName" => "input_1736438289786_180_869451736438289786_584",
							"input_1736438289786_180_869451736438289786_584" => $ShipToEmail
							],
							[
							"customAttributeId" => "input_4_22",
							"customAttributeValue" => $ShiptoPhoneNumber,
							"customAttributeType" => "input",
							"customAttributeTagName" => "input_1736438291922_764_718031736438291922_707",
							"customAttributeName" => "input_1736438291922_764_718031736438291922_707",
							"input_1736438291922_764_718031736438291922_707" => $ShiptoPhoneNumber
							],
							[
							"customAttributeId" => "input_4_23",
							"customAttributeValue" => $ShipToAlternatePhoneNumber,
							"customAttributeType" => "input",
							"customAttributeTagName" => "input_1736438293390_317_679601736438293390_46",
							"customAttributeName" => "input_1736438293390_317_679601736438293390_46",
							"input_1736438293390_317_679601736438293390_46" => $ShipToAlternatePhoneNumber
							],
							[
							"customAttributeId" => "input_4_24",
							"customAttributeValue" => $ShipToFax,
							"customAttributeType" => "input",
							"customAttributeTagName" => "input_1736438294992_553_1106931736438294992_678",
							"customAttributeName" => "input_1736438294992_553_1106931736438294992_678",
							"input_1736438294992_553_1106931736438294992_678" => $ShipToFax
							],
							[
							"customAttributeId" => "input_4_28",
							"customAttributeValue" => $BilltoAddress,
							"customAttributeType" => "input",
							"customAttributeTagName" => "input_1736438460922_535_987071736438460922_229",
							"customAttributeName" => "input_1736438460922_535_987071736438460922_229",
							"input_1736438460922_535_987071736438460922_229" => $BilltoAddress
							],
							[
							"customAttributeId" => "input_4_29",
							"customAttributeValue" => $AccountingInvoiceEmail,
							"customAttributeType" => "input",
							"customAttributeTagName" => "input_1736438470481_865_882371736438470481_265",
							"customAttributeName" => "input_1736438470481_865_882371736438470481_265",
							"input_1736438470481_865_882371736438470481_265" => $AccountingInvoiceEmail
							],
							[
							"customAttributeId" => "input_4_30",
							"customAttributeValue" => $BillToEmail,
							"customAttributeType" => "input",
							"customAttributeTagName" => "input_1736438485697_969_1187561736438485697_718",
							"customAttributeName" => "input_1736438485697_969_1187561736438485697_718",
							"input_1736438485697_969_1187561736438485697_718" => $BillToEmail
							],
							[
							"customAttributeId" => "input_4_31",
							"customAttributeValue" => $AccountingPhoneNumber,
							"customAttributeType" => "input",
							"customAttributeTagName" => "input_1736438502764_172_1277571736438502764_106",
							"customAttributeName" => "input_1736438502764_172_1277571736438502764_106",
							"input_1736438502764_172_1277571736438502764_106" => $AccountingPhoneNumber
							],
							[
							"customAttributeId" => "input_4_32",
							"customAttributeValue" => $PurchaseOrderNumberorreference,
							"customAttributeType" => "input",
							"customAttributeTagName" => "input_1736438559319_69_1231871736438559319_420",
							"customAttributeName" => "input_1736438559319_69_1231871736438559319_420",
							"input_1736438559319_69_1231871736438559319_420" => $PurchaseOrderNumberorreference
							],
							[
							"customAttributeId" => "input_4_36",
							"customAttributeValue" => $AccountingFax,
							"customAttributeType" => "input",
							"customAttributeTagName" => "input_1736438575018_214_668401736438575018_875",
							"customAttributeName" => "input_1736438575018_214_668401736438575018_875",
							"input_1736438575018_214_668401736438575018_875" => $AccountingFax
							]
						]
					];

						// $leadData = [
						// 				"firstName" => !empty($_POST['first_name']) ? ucfirst($_POST['first_name']) : 'NA',
						// 				"lastName" => !empty($_POST['last_name']) ? $_POST['last_name'] : 'NA',
						// 				"jobTitle" => "N/A",
						// 				"waytoContact" => !empty($_POST['email']) ? $_POST['email'] : 'NA',
						// 				"leadRank" => "1",               
						// 				"leadRankMeaning" => "High",     
						// 				"leadStatus" => "4",            
						// 				"leadStatusMeaning" => "Converted",            
						// 				"leadSource" => "NEW_CONTACT_FORM",            
						// 				"leadSourceMeaning" => "NEW_CONTACT_FORM",      
						// 				"leadTypeId" => "58873",                        
						// 				"leadTypeName" => "Existing Business",          
						// 				"assigneeObjectRefId" => 316889671,             
						// 				"assigneeObjectRefName" => "",                  
						// 				"assigneeObjectId" => 8,

						// 				"phoneNumbers" => [

						// 					[
						// 						"id" => "lead_phone_input",
						// 						"phoneNumber" => !empty($_POST['ship_to_phone']) ? $_POST['ship_to_phone'] : 'NA',              // Update value based on your firm
						// 						"phoneType" => "Business",
						// 						"phoneTypeCode" => "PHONE_BUSINESS"
						// 					]

						// 				],

						// 				"emailAddresses" => [

						// 					[
						// 						"id" => "cont_email_input",
						// 						"emailAddress" => !empty($_POST['email']) ? $_POST['email'] : 'NA',             // Update value based on your firm
						// 						"emailTypeCode" => "BUSINESS",
						// 						"emailType" => "Business"
						// 					]

						// 				],

						// 				"labels" => [],
						// 				"addresses" => [],
						// 				"customAttributes" => []

						// 			];

									$apiKey = "fHyYzDZUxJWX-anTYPGZIxDpIXRTB-39e1cc2e-7786-4d1d-b8ef-a25e8a49df4a";                       // Update value based on your firm - must required
									$accessKey = "DTYWzHZPXLWT-cRtHPWZVxUPOxQtF-975ecad5-bcca-4931-98a9-f06c07673816";             // Update value based on your firm - must required
								

									$postData = [
										"a" => "save",
										"objectId" => 4,
										"leadData" => json_encode($leadData),
										"apiKey" => $apiKey,
										"accessKey" => $accessKey
									];

									$url = "https://api2.apptivo.com/app/dao/v6/leads";
									$ch = curl_init();
									curl_setopt($ch, CURLOPT_URL, $url);
									curl_setopt($ch, CURLOPT_POST, true);
									curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
									curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
									curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
									$response = curl_exec($ch);
									$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
									// if (curl_errno($ch)) {

									// 	echo "cURL Error: " . curl_error($ch);

									// } else {
									// 	echo "HTTP Code: $httpCode\n";
									// 	echo "Response: $response";
									// 	echo "done";
									// }

									curl_close($ch);

				
				echo "done";
			}




	//added on 16-07-2025
	public function token_generator()
	{
		$data['informative'] = $this->db->select('*')->from('informative')->get()->row();
		$header['meta'] = $this->db->select('*')->from('seo_meta_tag')->where('page_name', 'Pyrosoft Customer Information')->get()->row();
		$this->load->view('pyrosoft/includes/header', $header);
		$this->load->view('pyrosoft/token-generator.php',$data);
		$this->load->view('pyrosoft/includes/footer');

	}


	


}
