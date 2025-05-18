@include('frontend.header')
@include('frontend.navbar')

<img src="{{ url('images/img8.jpg') }}" alt="">

<!-- About Us Section -->
    <section class="bg-white-100 py-20">
        <div class="container mx-auto px-6 md:px-12 lg:px-20">
            <div class="text-center mb-10">
                <h2 class="text-4xl font-bold text-gray-700 mb-4">About Us</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">Welcome to PetCare! Our mission is to provide top-notch services and unparalleled care for your beloved pets. With a dedicated team of professionals, we strive to ensure every pet feels loved and cared for.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <img src="images/about.jpg" alt="About Us Image" class="rounded-lg shadow-lg">
                </div>
                <div>
                    <h3 class="text-2xl font-semibold text-blue-500 mb-4">Our Story</h3>
                    <p class="text-gray-600 mb-4">Founded in 2010, PetCare began with a simple goal: to provide exceptional care for pets in a safe and loving environment. Over the years, we have grown into a trusted name in pet care services, thanks to our loyal clients and their furry friends.</p>

                    <h3 class="text-2xl font-semibold text-blue-500 mb-4">Our Values</h3>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li>Compassion: Treating every pet with love and respect.</li>
                        <li>Excellence: Delivering high-quality care and services.</li>
                        <li>Integrity: Building trust through honesty and transparency.</li>
                        <li>Community: Supporting pet owners and animal welfare initiatives.</li>
                    </ul>
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


    <!-- Our Team Section -->
    <section class="py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-700 mb-8">Meet Our Team</h2>
             <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                     <img src="#" alt="Team Member" class="w-24 h-24 mx-auto rounded-full mb-4">
                   <!-- <h3 class="text-xl font-semibold text-blue-500">Dr. Sarah Thompson</h3>
                    <p class="text-gray-600">Veterinarian</p>  -->
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="#" alt="Team Member" class="w-24 h-24 mx-auto rounded-full mb-4">
                    <!--  <h3 class="text-xl font-semibold text-blue-500">John Carter</h3>
                    <p class="text-gray-600">Pet Groomer</p> -->
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="#" alt="Team Member" class="w-24 h-24 mx-auto rounded-full mb-4">
                    <!--  <h3 class="text-xl font-semibold text-blue-500">Emma Roberts</h3>
                    <p class="text-gray-600">Pet Trainer</p> -->

                </div>
            </div>
        </div>
    </section>

@include('frontend.footerbar')
@include('frontend.footer')
