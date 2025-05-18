@include('frontend.header')
@include('frontend.navbar')

<img src="{{ url('images/cmm.png') }}" alt="">

<section class="meetings-page" id="meetings">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach ($communities as $community)
                        <div class="d-flex align-items-center">
                            <!-- SVG Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle me-2" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>

                            <!-- User Name -->
                            <h5 class="mb-0">{{ $community->user->name }}</h5>
                        </div>

                        <div class="card my-3 mx-auto">
                            <div class="card-body">
                                <div class="image-gallery text-center">
                                    @if ($community->photos && count($community->photos) > 0)
                                    <!-- Main Image -->
                                    <div class="main-image mb-2 d-flex justify-content-center">
                                        <img id="main-image-{{ $community->id }}" src="{{ asset('storage/' . $community->photos[0]) }}" alt="Main Photo" style="width: 500px; height: 500px; object-fit: cover;">
                                    </div>

                                    <!-- Thumbnails -->
                                    <div class="thumbnail-images d-flex justify-content-center">
                                        @foreach ($community->photos as $photo)
                                        <img src="{{ asset('storage/' . $photo) }}" alt="Thumbnail"
                                             class="thumbnail"
                                             style="width: 100px; height: 100px; object-fit: cover; margin-right: 10px; cursor: pointer;"
                                             onclick="updateMainImage('{{ $community->id }}', '{{ asset('storage/' . $photo) }}')">
                                        @endforeach
                                    </div>
                                    @endif
                                </div>

                                <p class="card-text">
                                    <small class="text-muted">
                                        Posted by {{ $community->user->name }} on {{ $community->created_at->format('F j, Y, g:i a') }}
                                    </small>
                                </p>

                                <p>Type: {{ ucfirst($community->post_type) }}</p>

                                @if ($community->post_type === 'question')
                                <h6>Question: {{ $community->question }}</h6>
                                @endif

                                <p>{{ $community->content }}</p>

                                <!-- Button to Open Comments Modal -->
                                {{-- <button type="button" class="btn btn-info btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#commentsModal{{ $community->id }}">
                                    View Comments
                                </button> --}}
                            </div>
                        </div>

                        {{-- <div class="comment-section">
                            <form action="{{ route('comments.store', $community->id) }}" method="POST" class="mb-3">
                                @csrf
                                <div class="input-group">
                                    <!-- Textarea -->
                                    <textarea
                                        name="comment"
                                        id="comment"
                                        class="form-control"
                                        placeholder="Write a comment..."
                                        required
                                        maxlength="1000"
                                        rows="1"
                                        style="border-radius: 20px 0 0 20px; resize: none;"></textarea>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary" style="border-radius: 0 20px 20px 0;">
                                        <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                                <br><br>
                                @error('comment')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </form>
                        </div> --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
      function updateMainImage(communityId, imageUrl) {
          const mainImage = document.getElementById(`main-image-${communityId}`);
          mainImage.src = imageUrl;
      }
    </script>

@include('frontend.footerbar')
@include('frontend.footer')
