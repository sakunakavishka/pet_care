@include('frontend.header')
@include('frontend.navbar')
  <!-- Sub Header -->

  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">

    <img src="{{url('images/homebg.jpg')}}" alt="">

      <div class="video-overlay header-text">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="caption">
              <h6>Hello Pet Lovers</h6>
              <h2>Welcome to pet care Assistant</h2>
              <p>Pet care means ensuring your pet's health and happiness by providing food, water, exercise, grooming, and love. It’s a lifelong commitment to their well-being.</p>
              </div>
            </div>
          </div>
      </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->
     <!-- #region -->


<section class="py-12 bg-white-50">
  <div class="container mx-auto text-center">
    <h2 class="text-3xl font-bold mb-8">Our Vision & Mission</h2>

    <div class="flex flex-col lg:flex-row justify-around space-y-8 lg:space-y-0">

      <!-- Vision Section -->
      <div class="bg-white rounded-lg shadow-lg p-8 max-w-md mx-auto">
        <h3 class="text-2xl font-semibold mb-4 text-blue-600">Our Vision</h3>
        <p class="text-gray-600">To create a world where every pet is loved, cared for, and receives the best services for a healthy and happy life.</p>
      </div>

      <!-- Mission Section -->
      <div class="bg-white rounded-lg shadow-lg p-8 max-w-md mx-auto">
        <h3 class="text-2xl font-semibold mb-4 text-green-600">Our Mission</h3>
        <p class="text-gray-600">To provide exceptional pet care services through dedication, compassion, and innovation, ensuring every pet receives the highest quality of care.</p>
      </div>

    </div>
  </div>
</section>


 <section class="bg-white-100 py-12">
  <div class="container mx-auto text-center">
    <h2 class="text-3xl font-bold mb-6">Our Services</h2>
    <p class="text-gray-600 mb-8">We provide a wide range of services to ensure your pets are healthy, happy, and loved.</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

      <!-- Service Card -->
      <div class="bg-white rounded-2xl shadow-lg p-6">
        <h3 class="text-xl font-semibold mb-4">Schecule</h3>
        <p class="text-gray-500">A pet care schedule keeps your pet healthy, happy, and secure with regular feeding, exercise, and grooming.</p>
      </div>

      <!-- Service Card -->
      <div class="bg-white rounded-2xl shadow-lg p-6">
        <h3 class="text-xl font-semibold mb-4">Health Recode</h3>
        <p class="text-gray-500">Pet health records track your pet's medical history, ensuring timely care and helping vets make informed decisions for your pet's well-being.</p>
      </div>

      <!-- Service Card -->
      <div class="bg-white rounded-2xl shadow-lg p-6">
        <h3 class="text-xl font-semibold mb-4">Supply Management</h3>
        <p class="text-gray-500">Supply management ensures the efficient flow of goods and services, meeting needs on time while minimizing costs.</p>
      </div>


      </div>
    </div>
  </div>
</section>

<br></br>
<br></br>
<br></br>
<br></br>
<br></br>


          <section class="py-12 bg-white-100">
  <div class="container mx-auto text-center">
    <h2 class="text-3xl font-bold mb-8">Our Pet Care Gallery</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

      <!-- Gallery Image 1 -->
      <div class="relative">
        <img src=  "images/img1.jpeg" alt="Pet Care Image 1" class="w-full h-full object-cover rounded-lg shadow-lg">
        <div class="absolute inset-0 bg-black opacity-25 rounded-lg"></div>
      </div>

      <!-- Gallery Image 2 -->
      <div class="relative">
        <img src="images/img2.jpeg" alt="Pet Care Image 2" class="w-full h-full object-cover rounded-lg shadow-lg">
        <div class="absolute inset-0 bg-black opacity-25 rounded-lg"></div>
      </div>

      <!-- Gallery Image 3 -->
      <div class="relative">
        <img src="images/img3.jpeg" alt="Pet Care Image 3" class="w-full h-full object-cover rounded-lg shadow-lg">
        <div class="absolute inset-0 bg-black opacity-25 rounded-lg"></div>
      </div>

      <!-- Gallery Image 4 -->
      <div class="relative">
        <img src="images/img4.webp" alt="Pet Care Image 4" class="w-full h-full object-cover rounded-lg shadow-lg">
        <div class="absolute inset-0 bg-black opacity-25 rounded-lg"></div>
      </div>

      <!-- Gallery Image 5 -->
      <div class="relative">
        <img src="images/img5.webp" alt="Pet Care Image 5" class="w-full h-full object-cover rounded-lg shadow-lg">
        <div class="absolute inset-0 bg-black opacity-25 rounded-lg"></div>
      </div>

      <!-- Gallery Image 6 -->
      <div class="relative">
        <img src="images/img6.jpg" alt="Pet Care Image 6" class="w-full h-full object-cover rounded-lg shadow-lg">
        <div class="absolute inset-0 bg-black opacity-25 rounded-lg"></div>
      </div>

    </div>
  </div>
</section>


<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>



  @include('frontend.footerbar')
  @include('frontend.footer')
