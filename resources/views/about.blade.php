@extends('layouts.master')

@section('content')
	<style>

		.aboutPage {
			text-align: right;

		}

		.aboutPage > div.featured {
			padding-top: 80px;
			padding-bottom: 80px;
			position: relative;
		}

		.aboutPage > div.heading {
			margin: 50px auto;
		}

		.aboutPage > div.heading:after {
			content: '';
			position: absolute;
			width: 100%;
			height: 100%;
			background-image: url("theme/standard/images/dark-logo.png");
			background-position: center;
			background-size: contain;
			background-repeat: no-repeat;
			top: 0;
			left: 0;
			z-index: -1;
			opacity: 0.05;
		}

		.heading h1 {
			text-align: center;
			font-size: 50px;
		}

		.heading h4 {
			text-align: center;
			font-size: 20px;
			color: gray;
			padding: 20px 0;
			line-height: 30px;
		}

		.description h1 {
			font-size: 50px;
			vertical-align: top;
		}

		.description {
			vertical-align: top;
			font-size: 20px;
			background-color: #faf9f8;
		}

		.description p {
			font-size: 18px;
			text-align: right;
		}

		.row {
			margin: 0;
		}

		.servicesSliders {
			margin-top: 40px !important;
		}

		.services {
			position: relative;
			padding-top: 100px !important;
			padding-bottom: 60px !important;
		}

		.services .img-container {
			padding: 30px;
		}

		/*.services .img-container h4 {*/
		/*padding: 20px 0;*/
		/*}*/

		.services p {
			direction: rtl;
		}

		.services p a {
			font-size: 18px;
			padding: 20px 0;
			max-width: 350px;
		}

		.slick-prev, .slick-next {
			width: 60px;
			height: 60px;
			position: absolute;
			top: 0;
			bottom: 100px;
			margin: auto;
			background-image: url("theme/standard/images/left.png");
			background-position: center;
			background-size: 15px;
			background-repeat: no-repeat;
			left: -70px;
		}

		.slick-next {

			background-image: url("theme/standard/images/right.png");
			left: auto;
			right: -70px;
		}

		.slick-prev:before, .slick-next:before {
			color: transparent;
		}

		.img-container a {
			color: black;
		}

		.img-container a:hover, .img-container a:focus {
			text-decoration: none;
		}

		.servicesSliders {
			width: 80%;
			margin: auto;
		}

		.banner {
			background: url(theme/standard/images/about-banner.jpg);
			background-size: cover;
			/*position: fixed;*/
			background-position: center;
			background-repeat: no-repeat;
			/*background-attachment: fixed;*/
			padding: 100px 0 !important;
			position: relative;

		}

		.banner:after {
			content: "";
			position: absolute;
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
			background: #000;
			background: linear-gradient(to right, transparent, #000);
			opacity: 0.6;
			z-index: 0;
		}

		.get-updates input {
			height: 100%;
			transition-duration: 0.3s;
			width: 100%;
			line-height: 20px;
			padding: 11px 30px;
			text-align: right;
			border: 1px solid #c7c7c7;
			border-radius: 5px;
		}

		.get-updates input:focus {
			box-shadow: 0 0 5px 0 #ccc;
			outline: none;
		}

		.get-updates input::placeholder {
			color: #b9b9b9;
		}

		.get-updates button {
			border: 0;
			height: 60px;
			width: 220px;
			text-align: center;
			border-radius: 5px;
			background-color: #9d9d9d;
			color: white;
			font-size: 19px;
			cursor: pointer;
		}

		.get-updates button:focus, .get-updates button:hover {
			outline: none;
		}

		.get-updates {
			background-color: #fafafa;
			padding-top: 0 !important;
			padding-bottom: 45px !important;
		}

		.get-updates h1 {
			text-align: center;
			font-size: 50px;
			padding: 45px 0;
		}

		.get-updates h4 {
			text-align: center;
			font-size: 20px;
			color: gray;
			/* padding: 20px 0; */
			line-height: 30px;
		}

		.get-updates input {
			padding: 11px 40px;
		}

		.get-updates form > div {
			display: inline-block;
			padding: 0px 16px;
			margin-top: 11px;
		}

		.get-updates form {
			margin-top: 70px;
			text-align: center;
		}

		.vision-message {
			color: #fff;
			position: relative;
			z-index: 9;
			max-width: 450px;
		}

		.vision-message p {
		}

		.vision-message h2 {
			padding: 20px 0;
			background-size: 30px;
			background-repeat: no-repeat;

			padding-right: 50px;
			background-position: right center;

			/*border-bottom: 1px solid #fff;;*/
			/*border-top: 1px solid #fff;;*/
			/*background-color: rgba(255,255,255,0.2);*/
		}

		.objs-values {
			background-color: #faf9f8;
			padding-top: 130px;
			padding-bottom: 90px;
		}

		.objs-values .card li {
			opacity: 0.8;
			/*list-style: disc;*/
			margin: 8px 0;
		}

		.objs-values .card li:before {
			content: "";
			display: inline-block;
			width: 13px;
			height: 13px;
			vertical-align: middle;
			background: url(theme/standard/images/check.png) no-repeat;
			background-size: 13px;
			background-position: center;
			border-radius: 50%;
			margin-left: 8px;

			opacity: 0.5;
		}

		.objs-values .card {
			border: none;
			padding: 30px;
			box-sizing: border-box;
		}

		@media (min-width: 768px) {
			.objs-values .col-md-6 {
				background: #fff;
				-ms-flex: 0 0 50%;
				flex: 0 0 48%;
				max-width: 48%;
				margin: 1%;
			}
		}

		.featuredSliders .row {
			direction: rtl;
		}

		.featuredSliders .slick-dots {
			position: absolute;
			bottom: -50px;
			padding: 0;
			width: 34%;
			right: 0;
		}





		#about #about_snippet,#contact #about_snippet{
			/*background: url(images/about.jpg) center no-repeat;*/
			background-size: cover;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-ms-background-size: cover;
			-o-background-size: cover;
			padding: 240px 135px 188px 0;
		}

		#about #about_snippet{
			position: relative;
			overflow: hidden;
		}

		#about #about_snippet>div{
			/*position: relative;*/
		}
		#about #about_snippet img{
			position: absolute;
			width: 120%;
			bottom: 0;
			left:-10%;
			z-index: 0;
			/* display: none; */
		}#about #about_snippet p{
			 position: relative;
			 z-index: 10;
		 }
		#about #about_snippet>div>div,
		#contact #about_snippet>div>div{
			padding-top: 70px;
		}
		#about #about_snippet,#about #values  a,
		#contact #about_snippet,#about #values  a,
		#about #values .values_container a{
			box-sizing: border-box;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			-ms-box-sizing: border-box;
			-o-box-sizing: border-box;
		}
		#contact #about_snippet p,
		#about #about_snippet p{
			color: #fff;
			font-size: 16px;
			padding-bottom: 20px;
			line-height: 1.5;
			max-width: 585px;
		}
		#about .about_content{
			background: #f3f1f8;
		}
		#about .about_pager{
			width: 100%;
			margin: 9px 0 0px;
			background: #fff;
		}
		#about .about_pager li{
			float: right;
			text-align: center;
			width: 16.666%;
		}
		#about .about_pager li a{
			cursor: pointer;
			display: block;
			color: #525252;
			font-size: 13px;
			font-weight: bold;
			padding: 13px 0;
		}
		#about #values a span,
		#about .about_pager li a,
		.gm-style img{
			transition: all .3s;
			-webkit-transition: all .3s;
			-moz-transition: all .3s;
			-o-transition: all .3s;
			-ms-transition: all .3s;
		}
		#about .about_pager li a:hover{
			background: #F3F1F8;
		}

		#about .about_item{
			margin: 35px 0;
			margin-top: 0;
			padding-top: 35px;
			width: 50%;
			float: right;
		}#about #bank-note.about_item{
			 padding-top: 0px;
			 width: 100%;
		 }

		#about .about_img{
			width: 100%;
		}

		#about .about_item:first-child{
			width: 100%;
		}

		#about .about_item strong{
			color: #000;
		}

		#about .about_item div.col{
			width: 50%;
			float: right;
		}

		#about .about_item div.col:first-child{
			padding-left: 20px;
		}
		#about .about_item div.col:last-child{
			padding-right: 20px;
		}

		#about .right_about{
			float: right;
			width: 68%;
		}
		#about .left_about{
			float: left;
			max-width: 316px;
			width: 30%;
		}
		#about .left_about img{
			width: 100%;
		}
		#about h1,#about .about_item h2 {
			color: #352757;
			font-size: 21px;
			padding: 23px 0;
		}
		#about h1{
			padding-top: 35px;
		}
		#about .about_item p{
			color: #525252;
			font-size: 14px;
			padding-bottom: 33px;
			line-height: 1.5;
			max-width: 585px;
		}
		#about #values,#about #strategy{
			padding: 70px 0 28px;
			background: #fff;
		}
		#about #strategy{
			background: #f3f1f8;
		}
		#about #values h2,#about #strategy h2{
			color: #9162a7;
			font-size: 21px;
			padding-bottom: 75px;
			text-align: center;
		}

		#about #values ul,#about #values .values_container{
			width: 64%;
			margin: 0 auto 40px;
		}
		#about #values li,
		#about #values .values_container a{
			float: none;
			width: 16%;
			text-align: center;
			cursor: pointer;
		}
		#about #values li a,
		#about #values .values_container a{
			display: inline-block;
			/*background: #d9c4c8;*/
			padding: 30px 0;
			color: #352757;
			font-weight: bold;
		}

		#about #values li:first-child a,#about #values  a:first-child span{
			border: none;
			background: rgba(105,20,37,0.25);
		}
		#about #values li:nth-child(2) a,#about #values  a:nth-child(3) span{
			background: rgba(133,54,70,0.25);
		}
		#about #values li:nth-child(3) a,#about #values  a:nth-child(5) span{
			background: rgba(245,20,65,0.25);
		}
		#about #values li:nth-child(4) a,#about #values  a:nth-child(7) span{
			background: rgba(224,132,109,0.25);
		}
		#about #values li:nth-child(5) a,#about #values  a:nth-child(9) span{
			background: rgba(219,192,146,0.25);
		}
		#about #values li:nth-child(6) a,#about #values  a:nth-child(11) span{
			background: rgba(219,231,180,0.25);
		}
		#about #values li a span,#about #values a span{
			/*opacity: .5;*/
			font-size: 18px;
			height: 158px;
			width: 158px;
			border-radius: 158px;
			margin: auto;
			display: block;
			/*background-image: none;*/
			overflow: hidden;
		}

		#about #values .values_container a.oppened span{
			transition: all 0s;
			-webkit-transition: all 0s;
			-moz-transition: all 0s;
			-ms-transition: all 0s;
			-o-transition: all 0s;
			background-position: center 83%;
			background-repeat: no-repeat;
			background-image: url(images/close.png);
		}

		#about #values a span b{
			line-height: 2.5;
			text-align: center;
			opacity: .5;
			font-size: 15px;
			/* height: 158px; */
			padding-top: 42px;
			display: block;
		}
		#about #values li a:hover span,#about #values a:hover span b{
			opacity: 1;
		}
		#about #values a.read_more_value{
			font-size: 12px;
			text-align: center;
			display: block;
			width: 184px;
			margin: auto;
			color: #9162a7;
			background: #F9F9F9;
			padding: 10px 0;
			clear: both;
			float: none;
			cursor: pointer;
		}
		#about #values a.read_more_value:hover,#about #values a.read_more_value.active_value{
			color: #F9F9F9;
			background: #9162a7;

		}
		#about #values .superbox-show {
			width: 99.3%;
			display: block;
			float: right;
			padding: 20px 15px;
			/* border: 1px solid #c4c4c4; */
			border-top: none;
			display: none;
			margin-bottom: 20px;
			border-bottom: 1px solid #F0F0F0;
		}
		.fh5co-cover.fh5co-cover-sm {
			height: 600px;
		}
		@media screen and (max-width: 768px) {
			.fh5co-cover.fh5co-cover-sm {
				height: 400px;
			}
		}
		.fh5co-cover.fh5co-cover-sm .display-t,
		.fh5co-cover.fh5co-cover-sm .display-tc {
			height: 600px;
			display: table;
			width: 100%;
		}
		@media screen and (max-width: 768px) {
			.fh5co-cover.fh5co-cover-sm .display-t,
			.fh5co-cover.fh5co-cover-sm .display-tc {
				height: 400px;
			}
		}

		.about-content {
			margin-bottom: 7em;
		}
		.about-content img {
			border: 1px solid rgba(0, 0, 0, 0.05);
			padding: 10px;
		}
		.about-content .desc {
			margin-bottom: 3em;
		}

		.fh5co-heading {
			margin-bottom: 5em;
		}
		.fh5co-heading.fh5co-heading-sm {
			margin-bottom: 2em;
		}
		.fh5co-heading h2 {
			font-size: 20px;
			margin-bottom: 20px;
			line-height: 1.5;
			font-weight: bold;
			color: #000;
		}
		.fh5co-heading p {
			font-size: 18px;
			line-height: 1.5;
			color: #828282;
		}
		.fh5co-heading span {
			display: block;
			margin-bottom: 10px;
			text-transform: uppercase;
			font-size: 12px;
			letter-spacing: 2px;
		}

		.fh5co-staff {
			text-align: center;
			margin-bottom: 30px;
		}
		.fh5co-staff img {
			width: 170px;
		   display: initial;
			margin-bottom: 20px;
			-webkit-border-radius: 50%;
			-moz-border-radius: 50%;
			-ms-border-radius: 50%;
			border-radius: 50%;
		}
		.fh5co-staff h3 {
			font-size: 16px;
			margin-bottom: 5px;
		}
		.fh5co-staff p {
			margin-bottom: 30px;
		}
		.fh5co-staff .role {
			color: #bfbfbf;
			margin-bottom: 30px;
			font-weight: normal;
			display: block;
		}

		.fh5co-social-icons {
			margin: 0;
			padding: 0;
		}
		.fh5co-social-icons li {
			margin: 0;
			padding: 0;
			list-style: none;
			display: -moz-inline-stack;
			display: inline-block;
			zoom: 1;
			*display: inline;
		}
		.fh5co-social-icons li a {
			display: -moz-inline-stack;
			display: inline-block;
			zoom: 1;
			*display: inline;
			color: #FC5185;
			padding-left: 10px;
			padding-right: 10px;
		}
		.fh5co-social-icons li a i {
			font-size: 20px;
		}

		.fh5co-contact-info ul {
			padding: 0;
			margin: 0;
		}
		.fh5co-contact-info ul li {
			padding: 0 0 0 40px;
			margin: 0 0 30px 0;
			list-style: none;
			position: relative;
		}
		.fh5co-contact-info ul li:before {
			color: #FC5185;
			position: absolute;
			left: 0;
			top: .05em;
			font-family: 'icomoon';
			speak: none;
			font-style: normal;
			font-weight: normal;
			font-variant: normal;
			text-transform: none;
			line-height: 1;
			/* Better Font Rendering =========== */
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="{{asset('js/hb/responsive.css') }}" />
 >

	<div class="aboutPage">
		<div class="heading text-center site-width featured">
			<h2 class="heading_1">نبذة عنا</h2>
			<p class="para_1">ومنذ نشأتها وفرت الشركة خدمات مصرفية متميزة لجميع عملائها ووكلائها في كل محافظات الجمهورية اليمنية وفي كل مدن وقرى اليمن وخاصة المناطق النائية حتى اصبحت الشركة المميزة  في تقديم أفضل الخدمات المالية والمصرفية بتقنية عاليه عبر أكبر شبكة ونقاط خدمه داخل اليمن وخارجها.</p>
			<a href="#" data-toggle="modal" data-target="#moreaboutswaid"
			   class="btn mt-3 btn-light border">اقرأ المزيد</a>
			<!-- Modal -->
			<div class="modal fade" id="moreaboutswaid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
				 aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">من نحن:</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<img src="{{asset('uploads/about/main.jpg')}}"
							 alt="من نحن:"/>
						<div class="modal-body">
							<p style="direction: rtl;">
								لم يكن عام انطلاقنا للنور في عام عادي، ولم يكن انطلاقنا في مجال خدمات الصرافة الرقمية وكذلك الشبكة الإلكتروني شيءٌ تقليديٌ، بل إنه كان عام الضجة الحقيقية المملؤة بالحماس والأمل، وقد كانا هما الوسيلتين التي دعمتنا حتى وصلنا إلى النجاح، فقد أحدثنا طفرة جديدة في تقديم الخدمات المصرفية بشتى وسائلها، فلم نكن كأي شركة أخرى مُطلقًا، بل إننا كنا نبذل هِمة عالية كي يلوح نجاحنا في الأفق، ونحصل على السيادة كأفضل شركات متخصصة في الخدمات المصرفية على الإطلاق، عن طريق التواجد الرقمي الصحيح، فنحن الخيار المثالي لتقديم الخدمات المصرفية للعملاء عبر شبكتنا المحلية والخارجية ، سواء من خلال نظامنا الداخلي أو وكلائنا المنتشرين.


									وتسعى إدارة الشركة إلى التطوير والتحديث المستمر وبما يتوافق مع متطلبات السوق الحالية والمستقبلية ، حيث تقوم الشركة بتطوير أنظمتها الداخلية وهيكلها التنظيمي وأدلة سياسات وإجراءات العمل في الشركة وفق أحدث الممارسات العالمية لحوكمة الشركات لتصبح من أوائل شركات الصرافة التي تطبق الحوكمة في اليمن.</p>
							وقد اخذت علي عاتقها مبدأ الثقة – الامانة – الصدق – حسن التعامل وهي مستمرة في التألق والعطاء .
							مما جعلها تتوسع وتتمدد داخل الوطن حيث تعتبر الشركة من اكثر الشركات انتشارا داخل الجمهورية وهي آخذة في الازدياد سنويا وبشكل سريع ومدروس من قبل الإدارة ,
							ولقد حافظت الشركة على الميزات التي كانت السبب الرئيسي في تألقها وكسب ثقة الزبون من حيث تقديم الخدمة وسرعة التحويل وذلك عبر احدث وسائل الاتصال بما يواكب عصرنا من تطور مستمر وايضا من اهمها حسن المعاملة مع الزبون وذلك بتأهيل افضل الكوادر لدى الشركة .


						</div>
					</div>
				</div>

			</div>
		</div>

		<div class="description featured">
			<div class="site-width featuredSliders ltr row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-4">
							<div class="img-container">

								<img src="{{asset('uploads/about/صورة-عبد-الرحمن-الحوشبي.jpg')}}">
							</div>
						</div>
						<div class="col-md-8 pt-5">

							<div>
								<h3>كلمة المدير التنفيذي للشركة </h3>
								<p class="para_2">يسعدني ويشرفني أن ارحب بكم في الموقع الإلكتروني لشركة الحوشبي للصرافة ومن خلال تصفحكم لموقعنا سيكون بوسعكم الإطلاع على جميع الخدمات التي نقدمها.
									مجلس الإدارة يضع ضمن أولوياته الارتقاء بأساليب العمل وتحديث جميع السياسات والاهداف وتم بلورة ذلك في الخطة الاستراتيجية للشركة 2018-2023 . وبهذا الصدد فقد قامت الشركة بالاستعانة واستقطاب أفضل الكوادر اليمنية والتي لديها خبره عملية وإدارية متفردة </p>

								<a href="#" class="card-link" data-toggle="modal"
								   data-target="#page1">اقرأ المزيد</a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="page1" tabindex="-1" role="dialog"
			 aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="ChairmanMessage">كلمة المدير التنفيذي للشركة </h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<img src="{{asset('uploads/about/main.jpg')}} ">
					<div class="modal-body">
						<p style="direction: rtl;"><strong>كلمة المدير التنفيذي للشركة</strong></p>

						<p style="direction: rtl;">ثمة فارق كبير بين الامس واليوم  لذالك تسعى شركه الحوشبي وشبكة اتش بي فاست  لتكون من أوائل الشركات المعتمدة من البنك المركزي ومازالت أحد أعمدة سوق الخدمات المالية والمصرفية في اليمن، بنفس المبادئ التي كانت منذ بدايتنا، والتي ستبقى أساس تعاملنا ما بقينا، ولأننا جزء من العالم وتطوره، كان لزاماً علينا ان نواكب التطورات الحديثة في مجال خدمات الحوالات المالية المحلية والخارجية وكذلك الخدمات المصرفية على وجه الخصوص،
							إن رغبتنا هي تقديم أفضل الخدمات المصرفية ذات المستوى المحلي والعالمي في مجال القطاع المصرفي والخدمات المالية لكافة عملائنا سواءً كانو وكلاء أو عملاء.
							وأن مبدأنا هو تقديم خدمات مصرفية متميزة تلبي جميع أحتياجات عملائنا ووكلائنا فهذه الشركة إنما وجدت لتعمل جاهدة على خدمتكم وتكون محل رضى في أعينكم.
							إننا نحافظ على وضع متطلبات عملائنا في نصب أعيننا وهي محط اهتمامنا. بحيث ينالو أفضل الخدمات المصرفية
							والمتعددة من الشركة برضى تام من قبل الوكيل أو العميل.



							وأذا نظرناً الى التطور الذي شهدته شركة الحوشبي للصرافة في الاونة الاخيرة من تقدم وازدهار تتجلى شجاعتنا في تحويل ماكان يحلم به العميل الى حقيقية واقعية يستفيد منها جميع عملائنا ووكلائنا.


							وفي الختام لايسعني إلا أن اتقدم بشكري وتقديري لجميع عملاء ووكلاء شركة الحوشبي على دعمهم وثقتهم نحو الخدمات المقدمة من شركتنا ونتمنى أن يضل هذا الدعم والثقة وإنما لانكم الاساس الذي بنيت من أجله هذه الشركة ، كما أتقدم بشكري وتقديري لجميع موظفي الشركة على تفانيهم ومثابرتهم وثقتي كبيرة من أن تعاوننا معاً سيمهد لمزيد من الأنجازات والنجاحات.
						<div style="direction: rtl;text-align: Center; ">	أهلاً وسهلاً بكم في موقعنا،،،</div>
							<div style="direction: rtl;text-align: Center;">	أهلاً بالمستقبل</div>

<span dir="LTR">.</span></p>



						<p>&nbsp;</p>

						<div style="direction: rtl;">عبدالرحمن احمد الحوشبي</div>

						<div style="direction: rtl;">كلمة المدير التنفيذي للشركة </div>

						<div class="share">
							<span>مشاركة</span>
							<a href="http://www.facebook.com/sharer.php?u=https://swaidexchange.com/about/1"
							   target="_blank"><i class="fa fa-facebook"></i></a>

							<a href="https://twitter.com/intent/tweet?url=https://swaidexchange.com/about/1"
							   target="_blank"><i class="fa fa-twitter"></i></a>

							<a href="whatsapp://send?text=https://swaidexchange.com/about/1"><i
										class="fa fa-whatsapp"></i></a>

							<a href="https://plus.google.com/share?url=https://swaidexchange.com/about/1"
							   target="_blank"><i class="fa fa-google-plus"></i></a>


						</div>
						<br>
					</div>


				</div>
			</div>
		</div>
		{{--<div id="fh5co-about">--}}
			{{--<div class="container">--}}

				{{--<div class="row animate-box fadeInUp animated-fast">--}}
					{{--<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">--}}
						{{--<h2>مجلس الإدارة</h2>--}}
						{{--<p>يتشكل مجلس الإدارة من مجموعة من الأعضاء ذو خبرات في مجالات مختلفة تساهم بشكل كبير من قيادة الشركه إلى التقدم بخط ً ثابتة نحو النجاح و تحقيق أهدافه. وأعضاء مجلس الإدارة هم:</p>--}}
					{{--</div>--}}
				{{--</div>--}}
				{{--<div class="row">--}}
					{{--<div class="col-md-6 col-sm-4 animate-box fadeIn animated-fast" data-animate-effect="fadeIn">--}}
						{{--<div class="fh5co-staff">--}}
							{{--<img src="images/person_1.jpg" alt="Free HTML5 Templates by gettemplates.co">--}}
							{{--<h3>الاستاذ عبد الرحمن الحوشبي</h3>--}}
							{{--<strong class="role">المدير العام</strong>--}}
							{{--<p> يمثل راس الحربه للشركه</p>--}}
							{{--<ul class="fh5co-social-icons">--}}
								{{--<ul class="fh5co-social-icons">--}}
									{{--<ul class="social-icons">--}}
										{{--<li><a href="#" target="_blank" class="social-icon"> <i class="fa fa-facebook"></i></a></li>--}}
										{{--<li><a href="#" target="_blank" class="social-icon"> <i class="fa fa-twitter"></i></a></li>--}}
										{{--<li><a href="#" target="_blank" class="social-icon"> <i class="fa fa-youtube"></i></a></li>--}}
										{{--<li><a href="#" target="_blank" class="social-icon"> <i class="fa fa-whatsapp"></i></a></li>--}}

									{{--</ul>--}}
								{{--</ul>--}}
							{{--</ul>--}}
						{{--</div>--}}
					{{--</div>--}}
					{{--<div class="col-md-6 col-sm-8 animate-box fadeIn animated-fast" data-animate-effect="fadeIn">--}}
						{{--<div class="fh5co-staff">--}}
							{{--<img src="images/person_2.jpg" alt="Free HTML5 Templates by gettemplates.co">--}}
							{{--<h3>الاستاذ عبدالحافط الشامي</h3>--}}
							{{--<strong class="role">تائب المدير العام</strong>--}}
							{{--<p> يمثل.</p>--}}

						{{--</div>--}}
					{{--</div>--}}

				{{--</div>--}}
			{{--</div>--}}
		{{--</div>--}}
		{{--<div style="  height:100px">--}}


		{{--</div>--}}

		{{--<div id="fh5co-about">--}}
			{{--<div class="container">--}}

				{{--<div class="row animate-box fadeInUp animated-fast">--}}
					{{--<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">--}}
						{{--<h2>الاداره التنفيذيه</h2>--}}
						{{--<p>يتشكل مجلس الإدارةالتنفيذية  من مجموعة من الأعضاء ذو خبرات في مجالات مختلفة تساهم بشكل كبير من قيادة الشركه إلى التقدم بخط ً ثابتة نحو النجاح و تحقيق أهدافه. وأعضاء مجلس الإدارة هم:</p>--}}
					{{--</div>--}}
				{{--</div>--}}
				{{--<div class="row">--}}
					{{--<div class="col-md-12 col-sm-4 animate-box fadeIn animated-fast" data-animate-effect="fadeIn">--}}
						{{--<div class="fh5co-staff">--}}
							{{--<img src="images/person_1.jpg" alt="Free HTML5 Templates by gettemplates.co">--}}
							{{--<h3>الاستاذ عبد الرحمن الحوشبي</h3>--}}
							{{--<strong class="role">المدير العام</strong>--}}
							{{--<p> يمثل راس الحربه للشركه</p>--}}
							{{--<ul class="fh5co-social-icons">--}}
								{{--<ul class="fh5co-social-icons">--}}
									{{--<ul class="social-icons">--}}
										{{--<li><a href="#" target="_blank" class="social-icon"> <i class="fa fa-facebook"></i></a></li>--}}
										{{--<li><a href="#" target="_blank" class="social-icon"> <i class="fa fa-twitter"></i></a></li>--}}
										{{--<li><a href="#" target="_blank" class="social-icon"> <i class="fa fa-youtube"></i></a></li>--}}
										{{--<li><a href="#" target="_blank" class="social-icon"> <i class="fa fa-whatsapp"></i></a></li>--}}

									{{--</ul>--}}
								{{--</ul>--}}
							{{--</ul>--}}
						{{--</div>--}}
					{{--</div>--}}
					{{--<div class="col-md-4 col-sm-4 animate-box fadeIn animated-fast" data-animate-effect="fadeIn">--}}
						{{--<div class="fh5co-staff">--}}
							{{--<img src="images/person_2.jpg" alt="Free HTML5 Templates by gettemplates.co">--}}
							{{--<h3>الاستاذ عبدالحافط الشامي</h3>--}}
							{{--<strong class="role">تائب المدير العام</strong>--}}
							{{--<p> يمثل.</p>--}}
							{{--<ul class="fh5co-social-icons">--}}
								{{--<ul class="fh5co-social-icons">--}}
									{{--<ul class="social-icons">--}}
										{{--<li><a href="#" target="_blank" class="social-icon"> <i class="fa fa-facebook"></i></a></li>--}}
										{{--<li><a href="#" target="_blank" class="social-icon"> <i class="fa fa-twitter"></i></a></li>--}}
										{{--<li><a href="#" target="_blank" class="social-icon"> <i class="fa fa-youtube"></i></a></li>--}}
										{{--<li><a href="#" target="_blank" class="social-icon"> <i class="fa fa-whatsapp"></i></a></li>--}}

									{{--</ul>--}}
								{{--</ul>--}}
							{{--</ul>--}}
						{{--</div>--}}
					{{--</div>--}}
					{{--<div class="col-md-4 col-sm-4 animate-box fadeIn animated-fast" data-animate-effect="fadeIn">--}}
						{{--<div class="fh5co-staff">--}}
							{{--<img src="images/person_3.jpg" alt="Free HTML5 Templates by gettemplates.co">--}}
							{{--<h3>الاستاذ منيف </h3>--}}
							{{--<strong class="role">المدير العام للتويق</strong>--}}
							{{--<p> كلمه الالاستا.</p>--}}
							{{--<ul class="fh5co-social-icons">--}}
								{{--<ul class="fh5co-social-icons">--}}
									{{--<ul class="social-icons">--}}
										{{--<li><a href="#" target="_blank" class="social-icon"> <i class="fa fa-facebook"></i></a></li>--}}
										{{--<li><a href="#" target="_blank" class="social-icon"> <i class="fa fa-twitter"></i></a></li>--}}
										{{--<li><a href="#" target="_blank" class="social-icon"> <i class="fa fa-youtube"></i></a></li>--}}
										{{--<li><a href="#" target="_blank" class="social-icon"> <i class="fa fa-whatsapp"></i></a></li>--}}

									{{--</ul>--}}
								{{--</ul>--}}
							{{--</ul>--}}
						{{--</div>--}}
					{{--</div>--}}
				{{--</div>--}}
			{{--</div>--}}
		{{--</div>--}}
		{{--<!-- Modal -->--}}
		<div class="modal fade" id="page5" tabindex="-1" role="dialog"
			 aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="ChairmanMessage">أهدافنا</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<img src="#">
					<div class="modal-body">
						<ul>
							<li>الإلتزام بتطبيق أفضل&nbsp;المعايير والممارسات الخاصة بحوكمة الشركات<span dir="LTR"> &nbsp;.</span></li>
							<li>تقديم خدمات مالية ومصرفية متنوعة ذات جودة عالية<span dir="LTR"> .</span></li>
							<li>تلبية إحتياجات العميل وتحقيق الرضى في تلبيتها<span dir="LTR"> .</span></li>
							<li>إستخدام التكنولوجيا المتطورة والرفع من كفاءة العمليات<span dir="LTR"> .</span></li>
							<li>خلق شبكة علاقات محلية ودولية واسعة ومتنوعة<span dir="LTR"> .</span></li>
							<li>التأهيل والتدريب المستمر للموارد البشرية وتحقيق الرضى الوظيفي<span dir="LTR">.</span></li>
							<li>زيادة الحصة السوقية وتعزيز الموقع التنافسي للشركة<span dir="LTR"> .</span></li>
							<li>الرفع من معدل العائد للشركاء<span dir="LTR"> .</span></li>
						</ul>

						<div class="share">
							<span>مشاركة</span>
							<a href="http://www.facebook.com/sharer.php?u=https://swaidexchange.com/about/5"
							   target="_blank"><i class="fa fa-facebook"></i></a>

							<a href="https://twitter.com/intent/tweet?url=https://swaidexchange.com/about/5"
							   target="_blank"><i class="fa fa-twitter"></i></a>

							<a href="whatsapp://send?text=https://swaidexchange.com/about/5"><i
										class="fa fa-whatsapp"></i></a>

							<a href="https://plus.google.com/share?url=https://swaidexchange.com/about/5"
							   target="_blank"><i class="fa fa-google-plus"></i></a>


						</div>
						<br>
					</div>


				</div>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="page6" tabindex="-1" role="dialog"
			 aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="ChairmanMessage">قيمنا</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<img src="#">
					<div class="modal-body">
						<ul>
							<li>الثقة والإلتزام .</li>
							<li>إحترام سرية المعلومات الخاصة بالعملاء .</li>
							<li>التميز في الخدمات المصرفية .</li>
							<li>الإبداع والتطوير في قدرات الكادر البشري .</li>
							<li>المسئولية المجتمعية .</li>
						</ul>

						<div class="share">
							<span>مشاركة</span>
							<a href="http://www.facebook.com/sharer.php?u=https://swaidexchange.com/about/6"
							   target="_blank"><i class="fa fa-facebook"></i></a>

							<a href="https://twitter.com/intent/tweet?url=https://swaidexchange.com/about/6"
							   target="_blank"><i class="fa fa-twitter"></i></a>

							<a href="whatsapp://send?text=https://swaidexchange.com/about/6"><i
										class="fa fa-whatsapp"></i></a>

							<a href="https://plus.google.com/share?url=https://swaidexchange.com/about/6"
							   target="_blank"><i class="fa fa-google-plus"></i></a>


						</div>
						<br>
					</div>


				</div>
			</div>
		</div>

		<div class="banner background">
			<div class="site-width">
				<div class=" vision-message">

					<h2 style="background-image: url('uploads/about/vision.png')">رؤيتنا</h2>
					<p style="color: #fff;">ان تكون الأختيار الأول لكافة العملاء والشركة السائدة في تقديم  أفضل الخدمات المصرفية</p>
					<br>
					<h2 style="background-image: url('uploads/about/message.png')">رسالتنا</h2>
					<p style="color: #fff;">الوصول الى الريادة في مجال توفير خدمات الحوالات السريعة وصرف العملات محلياً ودوليا من
						خلال الارتقاء بتجربة العملاء والعمل المستمر على تطوير التكنولوجيا المتبعة لدينا، فضلاً عن
						توسيع نطاق شبكة الفروع والوكلاء المنتشرة محلياً ودولياً وتحسين مستوى الخدمات المقدمة
						بما يتماشى مع أعلى معايير الجودة والتميز.

						</p>
					<br>

				</div>
			</div>
		</div>
		<div class="objs-values">
			<div class="site-width">
				<ul class="row">
					<li class="col-md-6 mb-4 hover-up-shadow">
						<div class="card " style=" background-color :#faf9f8; ">
							<div class="card-body">
								<h5 class="card-title">الأهداف الداخلية:</h5>
								<p style="color: #fff;" ></p>
								<ul>
									<li>1-تطوير وتنفيذ الهيكل  التنظيمي  داخل الشركة.<span dir="LTR"> &nbsp;.</span></li>
									<li>2-تطوير وتحديث نظام الشركة بشكل مستمر.<span dir="LTR"> .</span></li>
									<li>3-الالتزام والعمل بمعايير الامتثال.<span dir="LTR"> .</span></li>
									<li>4-عمل خطط مستقبلية ورفعها وتنفيذها.<span dir="LTR"> .</span></li>

									<h5 class="card-title">	الأهداف الخارجية:</h5>
									<li>	1-التوسع والانتشار.<span dir="LTR"> .</span></li>
									<li>2-نشر الوعي والتثقيف بمعايير الامتثال.<span dir="LTR"> .</span></li>
									<li>3-بناء علاقات راسخة وطويلة الامد مع الشركات الداخلية والخارجية.<span dir="LTR">.</span></li>
									<li>4- زيادة الحصة السوقية وتعزيز الموقع التنافسي للشركة<span dir="LTR"> .</span></li>
									<li>5-بناء كادر بشري و العمل على تطويره<span dir="LTR"> .</span></li>
								</ul>

							</div>
						</div>
					</li>
					<li class="col-md-6 mb-4 hover-up-shadow">
						<div class="card ">
							<div class="card-body">
								<h5 class="card-title">قيمنا</h5>
								<p></p>
								<ul>
									<li>خدمة المجتمع. </li>
									<li>الأمانة</li>
									<li>العمل بروح الفريق الواحد لرفد ورفع مستوى الاقتصاد.</li>
									<li>الوضوح و الشفافية</li>
									<li>الاحترام</li>
									<li>ترك آثار طيبة -عبر تعاملاتنا-في نفوس عملائنا.</li>
									<li>الثقة والإلتزام.</li>
									<li>إحترام سرية المعلومات الخاصة بالعملاء.</li>
									<li>التميز في الخدمات المصرفية.</li>
									<li>الإبداع والتطوير في قدرات الكادر البشري.</li>
									<li>المسئولية الاجتماعية</li>
								</ul>

							</div>
						</div>
					</li>


				</ul>
			</div>
		</div>
</div>



	<section class="content clearfix" id="about">

			<div id="values">
				<div class="site-width">
					<h2>القيم والمبادئ</h2>
					<h2>منظومة القيم هي</h2><div class="values_container clearfix"><a> <span> <b> الالتزام </b> </span> </a><div class="superbox-show"><h3>الالتزام</h3><p>الالتزام أولاً بأحكام الشريعة الإسلامية في جميع تعاملاتنا وخدماتنا المصرفية وجميع الاستثمارات والتمويلات لابد من خضوعها لإشراف هيئة الرقابة الشرعية وقبلها لرقابتنا الذاتية واستشعار رقابة الله سبحانه وتعالى فنحن نتعبد الله في عملنا ونستشعر النية الصالحة في جميع الأوقات. قال تعالى:( وما خلقت الجن والإنس إلا ليعبدون). الذاريات الآية(56).</p><p>الالتزام بمعايير مهنية عالية و بأحدث التقنيات في أداء الخدمة للعملاء، قال صلى الله عليه وسلم: (إن الله يحب إذا عمل أحدكم عملاً أن يتقنه).رواه الطبراني.</p><p>الالتزام بانتقاء واختيار كادر بشري متميز يؤمن برسالة البنك و يؤمن كذلك بمنظومة القيم وترسيخ مبدأ أن معيار الكفاءة والفعالية في العمل هو أساس الترقي قال تعالى:(إن خير من استأجرت القوي الأمين)القصص الآية(26).</p><p>&middot; الالتزام بالقوانين والتشريعات وتعليمات جهات الإشراف والامتثال الطوعي لها بما يحقق المنفعة والقيمة المضافة للاقتصاد الوطني قال تعالى: (يأيها الذين آمنوا أوفوا بالعقود) المائدة الآية(1).</p></div> <a> <span> <b> الأمانة </b> </span> </a><div class="superbox-show"><p>&nbsp;</p><h3>الأمانة</h3>نعمل بتفاني وإخلاص مستشعرين ثقل الأمانة وتبعاتها فالأمانة هي المحور الأساسي التي تدور حولها كل الأعمال، فلا نقبل بأي تفريط أو انتقاص للأمانة، فالأمانة مع الله أولاً ثم مع العملاء.<p>&nbsp;</p><p>قال رسول الله صلى الله عليه وسلم: ( أد الأمانة لمن ائتمنك ولا تخن من خانك).</p></div> <a> <span> <b> الاحترام </b> </span> </a><div class="superbox-show"><h3>نحترم</h3><p>&middot; نحترم بعضنا في بيئة العمل فلا نصدر أي إساءة سواء كانت باللفظ أو بالفعل على أي من عملائنا ونرد على الإساءة بالإحسان قال صلى الله عليه وسلم:(المسلم من سلم المسلمون من لسانه ويده)رواه البخاري.</p><p>نحترم جميع عملائنا مهما اختلف دينهم أو جنسهم أو مستوى تعليمهم ونستمد ذلك من أخلاقنا المستمدة من ديننا الإسلامي قال تعالى: ( ولقد كرمنا بني آدم) الإسراء الآية (70).</p><p>نحترم عملائنا فنحفظ خصوصيتهم وأسرارهم ولا يمكن إفشاءها أو تسريبها للغير قال تعالى:(يأيها الذين امنوا لا تخونوا الله والرسول وتخونوا أماناتكم وأنتم تعلمون ) الأنفال الآية (27).</p></div> <a> <span> <b> الوضوح و الشفافية </b> </span> </a><div class="superbox-show"><h3>الوضوح و الشفافية</h3><p>الوضوح في المهام والمسئوليات والإجراءات والأهداف وصياغتها بطريقة سهلة وبسيطة بحيث نتمكن من أن نؤدي وننجز أعمالنا بشفافية وتتسم علاقاتنا مع بعضنا أو مع عملائنا بالشفافية، من الوضوح التواصل المفتوح مع بعضنا ومع عملائنا فلا بد من فتح قنوات تواصل لأنها هي أهم وسيلة للوضوح والشفافية، فلا يوجد أي لبس أو غموض و إذا وجد يجب علينا شرحه وتوضيحه ونبتعد عن أي تعارض مصالح يظهر أثناء أدائنا لأعمالنا كما جاء في الحديث عن رسول الله صلى الله عليه وسلم قوله:(على رسلكما إنها صفية...الحديث)رواه البخاري ومسلم.</p></div> <a> <span> <b> حب الخير </b> </span> </a><div class="superbox-show"><h3>حب الخير</h3><p>تنعكس محبة الخير للآخرين في الرغبة في تقديم جميع منتجات وخدمات البنك للعملاء بقصد جلب الخير عن طريق تطوير أعمالهم، وتسهيل قضاء احتياجاتهم وتوفير خدماتنا لهم بمصداقية وسرعة وجودة في أصعب الظروف والأوقات. قال صلى الله عليه وسلم: (لا يؤمن أحدكم حتى يحب لأخيه ما يحب لنفسه) متفق عليه.</p></div> <a> <span> <b> المسئولية الاجتماعية </b> </span> </a><div class="superbox-show"><h3>المسئولية الاجتماعية</h3><p>إن المسؤولية الاجتماعية عملية شاملة ومتكاملة تؤثر في تماسك بنيان المجتمع وتحقق التوازن فيه، وتعمل على توظيف جميع طاقات ومقدرات المجتمع من خلال مشاركة جميع أفراده مما يشعرهم بقيمهم وبمكانتهم الاجتماعية، فيحرص الجميع على المصلحة العامة فيبذلون أقصى جهودهم ويعملون على تحقيقها وتسرهم رؤية نتائج جهودهم تقدماً وازدهاراً لمجتمعهم. فمسئوليتنا نحو مجتمعنا أن نحدث أثر وبصمة إيجابية ونساهم في تحقيق تنمية اجتماعية واقتصادية في بلدنا. قال صلى الله عليه وسلم: ( خير الناس أنفعهم للناس) رواه بن ماجه.</p></div></div>                <a class="read_more_value" data-hide="اخفاء" data-view="تعرف أكثر على قيمنا">تعرف أكثر على قيمنا</a>
				</div>
			</div>

			<div id="strategy">
				<div class="site-width">
					<h2>بيان الإستراتيجية</h2>
					<p dir="RTL" style="text-align: justify;">سنصل لكافة شرائح المجتمع اليمني حينما وأينما يتواجد العميل في كل حي وقرية ونعزز وننشر الشمول المالي، فبالإضافة لشبكة الفروع والوكلاء سنطور قنوات رقمية (الكترونية) بطريقة سهلة وآمنة وبتكلفة معقولة تجعلنا دوماً بجانب عملاءنا.</p><p dir="RTL" style="text-align: justify;">&nbsp;</p><p dir="RTL" style="text-align: justify;">بالاستفادة القصوى من التكنولوجيا والتقنيات الحديثة سنعمل على تحويل عمليات وخدمات البنك للعالم الرقمي لنتمكن من إضافة قيمة استراتيجية للعميل من حيث جودة الخدمة والتكلفة المناسبة.</p><p dir="RTL" style="text-align: justify;">&nbsp;</p><p dir="RTL" style="text-align: justify;">سنضع العميل في محور اهتمامنا لنتعرف على احتياجاته وتطوير خدمات وحلول مالية متنوعة ونوعية ومبتكرة تخدم الأفراد وأصحاب المشاريع الصغرى والصغيرة والمتوسطة والشركات تتوافق مع أحكام الشريعة الإسلامية لنحقق عائد جيد للمودعين والمساهمين.</p><p dir="RTL" style="text-align: justify;">&nbsp;</p><p dir="RTL" style="text-align: justify;">بالعمل وفق الممارسات الفضلى والمعايير العالمية سنبني بنك شامل يرتكز على أنظمة تقنية وإجراءات وأدلة عمل ونظام امتثال ومخاطر يتكيف مع بيئة العمل والمتغيرات والمستجدات لنتمكن من استمرارية العمل في أصعب الظروف.</p><p dir="RTL" style="text-align: justify;">&nbsp;</p><p dir="RTL" style="text-align: justify;">سنعمل على إدارة المواهب وبناء القدرات لتكوين فريق عمل مؤمن برؤية ورسالة وقيم البنك ومتحفز للإبداع ويقدم خدمة عملاء نموذجية.</p><p dir="RTL" style="text-align: justify;">&nbsp;</p><p dir="RTL" style="text-align: justify;">سنتميز في تبوء موقع ريادي في القطاع المصرفي وتكوين شراكات استراتيجية ليصل عدد عملائنا لـ 5 مليون عميل بنهاية 2023م.</p>            </div>
			</div>


			{{--<div id="board-directors">--}}
				{{--<div class="board_link" style="  background: url({{asset('images/board_bg.jpg')}}) left 22px no-repeat;   max-height: 181px;overflow: hidden;"><div class="site-width" style="    background: url({{asset('images/board-arrow.png')}})left 22px no-repeat; padding: 0 70px;"><h3>مجلس الإدارة</h3><p>يتشكل مجلس الإدارة من مجموعة من الأعضاء ذو خبرات في مجالات مختلفة تساهم بشكل كبير من قيادة الشركه إلى التقدم بخط ً ثابتة نحو النجاح و تحقيق أهدافه. وأعضاء مجلس الإدارة هم:</p></div></div><div class="site-width boards-content"><ul><li><strong> عبدالرحمن علي الحوشبي</strong> <span>رئيس المجلس</span></li><li><strong>الاستاذ عبه الحافظ الشامي</strong> <span>نائب الرئيس</span></li><li><strong>الاستاذ عبده الحافظ الشاميي</strong> <span>عضو</span></li><li><strong> ؤ</strong> <span>عضو</span></li><li><strong>لاري</strong> <span>عضو</span></li></ul><div class="clearfix board-members"><div><h4>هيئة الرقابة الشرعية البنك</h4><span>لاي</span> <span>لا</span></div><div><h4>المحاسبون القانونيون</h4><img alt="هيئة الرقابة الشرعية" src="userfiles/images/grant.png" /></div></div></div>        </div>--}}



		</div>
	</section>

	<script src="{{asset('js/hb/jquery-1.10.1.min.js') }}" type="text/javascript"></script>
	<script src="{{asset('js/hb/script.js') }}" type="text/javascript"></script>
@stop
