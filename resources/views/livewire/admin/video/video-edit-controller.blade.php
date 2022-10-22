<div>
    <section id="basic-form-layouts">
        <div class="row match-height">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">Units</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content collapse show">
                <div class="card-body">


                    <div class="form-body">
                      <h4 class="form-section"><i class="ft-user"></i> Unit Info</h4>
                      <div class="card-body">
                        <div class="form-group">
                            <label for="projectinput1">Name video</label>
                            <input type="text" id="name_video" class="form-control" placeholder="Name video"
                            name="fname" wire:model="name_video">
                          </div>
                    </div>
                    <div class="col-md-12">
                        <label class="col-md-3 label-control" for="projectinput1"> image video</label>
                        <div class="col-md-5">
                        <input type="file" class="form-control"
                        name="name_company" wire:model="image_video_new">
                        </div>
                        <br>
                                @if($image_video_new)
                                <img src="{{$image_video_new->temporaryUrl()}}" width="120px">
                                @else
                                <img src="{{ Storage::url('photos/' . $image_video) }}" width="100" height="100">
                                @endif
                              </div>
                      <div class="row">
                        <div class="col-md-6">
                            <br>
                            <br>

                            <button class="btn btn-primary" wire:click="edit_video">
                                <i class="la la-check-square-o"></i> edit
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
</div>
