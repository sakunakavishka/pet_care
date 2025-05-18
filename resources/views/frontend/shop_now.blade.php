@include('frontend.header')
@include('frontend.navbar')

<img src="{{url('images/img10.jpeg')}}" alt="">

<br></br>
 <div class="container">

    <p class="mb-4">Explore trusted pet shops and services by following the links below:</p>

    <div class="row">
        <!-- List of Shops -->
        @php
            $shops = [
                ['name' => 'MyPets', 'url' => 'https://mypets.lk/'],
                ['name' => 'PetShopper', 'url' => 'https://petshopper.lk/'],
                ['name' => 'AllForPets', 'url' => 'https://allforpets.lk/'],
                ['name' => 'PetBay', 'url' => 'https://petbay.lk/'],
                ['name' => 'CatLitter', 'url' => 'https://catlitter.lk/'],
                ['name' => 'PetBarn', 'url' => 'https://www.petbarn.lk/'],
                ['name' => 'BestCarePetShop', 'url' => 'https://bestcarepetshop.lk/shop'],
                ['name' => 'PandPPetShop', 'url' => 'https://pandppetshop.lk/'],
                ['name' => 'PetMarket', 'url' => 'https://petmarket.lk'],
                ['name' => 'Hayleys Pet Care', 'url' => 'https://www.hayleysanimalhealth.lk/pet-care/'],
                ['name' => 'PetVet Clinic', 'url' => 'https://www.petvet.lk/'],
                ['name' => 'PetsVCare', 'url' => 'https://petsvcare.lk/contact-us/']
            ];
        @endphp

        @foreach ($shops as $shop)
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $shop['name'] }}</h5>
                        <a href="{{ $shop['url'] }}" target="_blank" style="background-color: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block; text-align: center;">Visit Shop</a>                    </div>
                </div>
            </div>
        @endforeach
    </div>

<br></br>

    <!-- Contact Section -->
    <h1 class="mt-10">Pet Care Clinics</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">PetVet Clinic</h5>
                    <p class="card-text">
                        <strong>Address:</strong> 98/4, Havelock Road, Colombo 5, Sri Lanka<br>
                        <strong>Phone:</strong> (+94) 11 2 599 799 / (+94) 11 2 599 800<br>
                        <strong>Emergency:</strong> (+94) 777 738 838
                    </p>
                    <a href="https://www.petvet.lk/" target="_blank" class="btn btn-warning">Visit Website</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">PetsVCare Hospital</h5>
                    <p class="card-text">
                        <strong>Address:</strong> 506/7 Elvitigala Mawatha, Colombo 05, Sri Lanka<br>
                        <strong>Email:</strong> petsvcare@gmail.com / info@petsvcare.lk<br>
                        <strong>Phone:</strong> +94 11 230 3554 / +94 77 345 7238
                    </p>
                    <a href="https://petsvcare.lk/contact-us/" target="_blank" class="btn btn-warning">Visit Website</a>
                </div>
            </div>
        </div>
    </div>
</div>



@include('frontend.footerbar')
@include('frontend.footer')
