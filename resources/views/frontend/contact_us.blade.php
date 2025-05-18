@include('frontend.header')
@include('frontend.navbar')

<img src="{{url('images/img9.jpg')}}" alt="">

<!-- Contact Us Section -->
    <section class="bg-white-100 py-20">
        <div class="container mx-auto px-6 md:px-12 lg:px-20">
            <div class="text-center mb-10">
                <h2 class="text-4xl font-bold text-gray-700 mb-4">Contact Us</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">We'd love to hear from you! Whether you have questions, need assistance, or want to book our services, feel free to get in touch with us.</p>
            </div>
<br></br>
<br></br>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <h3 class="text-2xl font-semibold text-blue-500 mb-4">Get in Touch</h3>
                    <p class="text-gray-600 mb-4">Address: 123 PetCare Lane, Petville, PA 12345</p>
                    <p class="text-gray-600 mb-4">Phone: (123) 456-7890</p>
                    <p class="text-gray-600 mb-4">Email: info@petcare.com</p>
                    <p class="text-gray-600">Working Hours: Mon - Fri: 9 AM - 6 PM</p>
                </div>

                </div>
            </div>
        </div>
    </section>

<br></br>
<br></br>

    <!-- Map Section -->
<section class="py-20 bg-white-100">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold text-gray-700 mb-8">Our Location</h2>
        <div class="w-full h-80 md:h-96">
            <iframe class="w-full h-full rounded-lg shadow-lg"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.967443514022!2d-122.38348508468143!3d37.77397277975815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085809c0b0c99d9%3A0x92c9b894ba2e53ff!2sGolden%20Gate%20Bridge!5e0!3m2!1sen!2sus!4v1613962786118!5m2!1sen!2sus"
                    allowfullscreen=""
                    loading="lazy"></iframe>
        </div>
    </div>
</section>


     <!-- Image Section -->
    <section class="py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-700 mb-8">Gallery</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <img src="images/img4.webp" alt="Pet 1" class="rounded-lg shadow-lg">
                </div>
                <div>
                    <img src="images/img6.jpg" alt="Pet 2" class="rounded-lg shadow-lg">
                </div>
                <div>
                    <img src="images/img7.jpg" alt="Pet 3" class="rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </section>




@include('frontend.footerbar')
@include('frontend.footer')
