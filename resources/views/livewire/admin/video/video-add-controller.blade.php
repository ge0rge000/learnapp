<div>
    <style>
        span.error {
    color: red;
}

    </style>
        @if($case_video==0)
      <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Upload File</h5>
                    </div>

                    <div class="card-body">
                        <div id="upload-container" class="text-center">
                            <button id="browseFile" class="btn btn-primary">Brows File</button>
                        </div>
                        <div  style="display: none" class="progress mt-3" style="height: 25px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                        </div>
                    </div>

                    {{-- <div class="card-footer p-4" style="display: none">
                        <video id="videoPreview" src="" controls style="width: 100%; height: auto"></video>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($case_video==1)
    <section id="basic-form-layouts"  >

        <div class="row match-height">

                <h4 class="card-title" id="basic-layout-form">Units</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

              </div>
              <div class="card-content collapse show">
                <div class="card-body">


                    <div class="form-body">
                      <h4 class="form-section"><i class="ft-user"></i> Unit Info</h4>


                      <br>

                      <div class="row">


                          <div class="col-md-12">
                            <div   class="form-group">
                                <input type="text" id="name_video" class="form-control" placeholder="Name video"
                                name="fname" wire:model="name_video" >
                            </div>
                            <div  wire:ignore class="form-group">
                                <select class="select2 form-control" id="select2-dropdown" multiple  >
                                    <option value="">Select Option</option>
                                    @foreach(   $units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="col-md-3 label-control" for="projectinput1"> image video</label>
                            <div class="col-md-5">
                              <input type="file" class="form-control"
                              name="name_company" wire:model="image_video">
                            </div>
                            <div class="col-md-4">
                                    @if($image_video)
                                    <img src="{{$image_video->temporaryUrl()}}" width="120px">
                                    @endif
                              </div>
                          </div>
                      </div>


                      <div class="row">
                        <div class="col-md-6">
                            <br>
                            <br>

                            <button class="btn btn-primary" wire:click="unit_relate_video" {{ $case_video=="0"? 'disabled':'' }} >
                                <i class="la la-check-square-o"></i> Add
                              </button>
                          </div>

                          <div class="col-md-6">
                            @if(Session::has("message"))

                            <h1>{{ Session::get("message") }}</h1>
                            @endif
                          </div>
                      </div>





                    </div>

                </div>
              </div>
            </div>
          </div>

      </section>
      @endif
    @push('scripts')

        <script type="text/javascript">
            let browseFile = $('#browseFile');

            let resumable = new Resumable({
                target: '{{ route('upload.video') }}',
                query:{_token:'{{ csrf_token() }}'} ,// CSRF token
                fileType: ['mp4'],
                chunkSize: 10*1024*1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
                headers: {
                    'Accept' : 'application/json'
                },
                testChunks: false,
                throttleProgressCallbacks: 1,
            });

            resumable.assignBrowse(browseFile[0]);

            resumable.on('fileAdded', function (file) { // trigger when file picked
                console.log('fileAdded' , file);
                showProgress();
                resumable.upload() // to actually start uploading.
            });

            resumable.on('fileProgress', function (file) { // trigger when file progress update
                updateProgress(Math.floor(file.progress() * 100));
            });

            resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
                response = JSON.parse(response)
                resumable.removeFile(file);

                console.log('Success response:' , response , response.path);
              //  $('#videoPreview').attr('src', response.path);

                @this.set('video_id' , response.video_id)
                @this.set('case_video' , "1")

                $('.card-footer').show();
            });

            resumable.on('fileError', function (file, response) { // trigger when there is any error
                console.log(response);
                alert('file uploading error.')
            });


            let progress = $('.progress');
            function showProgress() {
                progress.find('.progress-bar').css('width', '0%');
                progress.find('.progress-bar').html('0%');
                progress.find('.progress-bar').removeClass('bg-success');
                progress.show();
            }

            function updateProgress(value) {
                progress.find('.progress-bar').css('width', `${value}%`)
                progress.find('.progress-bar').html(`${value}%`)
            }

            function hideProgress() {
                progress.hide();
            }
        </script>
    @endpush



  <script>

    $(document).ready(function () {

        $('#select2-dropdown').select2();
        $('#select2-dropdown').on('change', function (e) {
            var data = $('#select2-dropdown').select2("val");
            @this.set('unit_selected', data);


        });
    });
</script>


</div>
