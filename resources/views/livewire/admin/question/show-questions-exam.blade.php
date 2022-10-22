<div>
<style>
    .col-md-6.de {
    text-align: end;
}
</style>

    <div class="row" id="header-styling">
        <div class="col-md-12">
            <div class="form-group">

            </div>
          </div>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h4 class="card-title">exam relate to {{ $exam->year_type }} year</h4>

              <h4 class="card-title">questions relate to {{ $exam->name_exam }}</h4>

            </div>

            @if(Session::has("message"))


                    <div class="col-md-4 mb-2">
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get("message") }}
                          <a class="alertAnimation float-right" data-animation="zoomIn">
                            <i class="icon-arrow-right"></i>
                          </a>
                        </div>
                      </div>
            @endif
            <div class="card-content collapse show">

              <div class="table-responsive">
                <table class="table">
                  <thead class="table table-bordered mb-0">
                    <tr>
                      <th>question</th>
                      <th>a</th>
                      <th>b</th>
                      <th>c</th>
                      <th>d</th>
                      <th>True answer</th>
                      <th>mark</th>
                      <th>case</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($questions as $question )
                      <tr>
                           <td>{!!$question->question!!}</td>
                            <td>{{ $question->a }}</td>
                            <td>{{ $question->b }}</td>
                            <td>{{ $question->c }}</td>
                            <td>{{ $question->d }}</td>
                            <td>{{$question->trueanswer->ans }}</td>
                            <td>{{ $question->mark_question }}</td>

                            <td>
                                <a class="btn btn-primary" href="{{route('edit_question',['question_id'=>$question->id])}}"  >Edit  </a>

                                <a href="#"  class="btn btn-danger manual" onclick="confirm('are you sure to want delete it') || event.stopImmediatePropagation()"  wire:click.prevent="delete_questionchoice({{$question->id}})">Delete  </a>
                            </td>
                      </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>

            </div>
            <div class="card-content collapse show">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                        <h4 class="card-title">Pargraph </h4>
                    </div>

                </div>

                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class="table table-bordered mb-0">
                      <tr>
                        <th>question</th>
                        <th>answer</th>
                        <th>mark</th>
                        <th>case</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($questionspar as $question )
                        <tr>
                             <td>{!!$question->question!!}</td>

                             <td>{{$question->answer}}</td>
                             <td>{{ $question->mark_question }}</td>
                              <td>
                                  <a class="btn btn-primary" href="{{route('edit_pargraph',['question_id'=>$question->id])}}"  >Edit  </a>

                                  <a href="#"  class="btn btn-danger manual" onclick="confirm('are you sure to want delete it') || event.stopImmediatePropagation()"  wire:click.prevent="delete_questionpargraph({{$question->id}})">Delete  </a>
                              </td>
                        </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>

              </div>
              @foreach ( $blocks  as $key=> $block)
              <section id="css-classes" class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                        <h4 class="card-title">block {{ $block->title}} </h4>
                    </div>
                    <div class="col-md-6 de">
                        <a class="btn btn-primary" href="{{route('edit_block',['question_id'=>$block->id])}}"  >Edit  </a>

                        <a href="#"  class="btn btn-danger manual" onclick="confirm('are you sure to want delete it') || event.stopImmediatePropagation()"  wire:click.prevent="delete_questionblock({{$block->id}})">Delete  </a>
                    </div>
                </div>

                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div class="card-text">


                      <p>{!! $block->block !!}</p>
                      <div class="table-responsive">
                        <table class="table table-hover">
                          <tbody>
                            <tr>
                                <th>question</th>
                                <th>a</th>
                                <th>b</th>
                                <th>c</th>
                                <th>d</th>
                                <th>True answer</th>
                                <th>mark</th>
                                <th>case</th>
                              </tr>
                            </thead>
                            <tbody>

                                @foreach ($block->choices as $choice )
                                <tr>
                                      <td>{!!$choice->question!!}</td>
                                      <td>{{ $choice->a }}</td>
                                      <td>{{ $choice->b }}</td>
                                      <td>{{ $choice->c }}</td>
                                      <td>{{ $choice->d }}</td>
                                      <td>{{$choice->trueanswer->ans }}</td>
                                      <td>{{ $choice->mark_question }}</td>

                                      <td>
                                          <a class="btn btn-primary" href="{{route('edit_question',['question_id'=>$choice->id])}}"  >Edit  </a>

                                          <a href="#"  class="btn btn-danger manual" onclick="confirm('are you sure to want delete it') || event.stopImmediatePropagation()"  wire:click.prevent="delete_questionchoice({{$choice->id}})">Delete  </a>
                                      </td>
                                </tr>
                                @endforeach



                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              @endforeach
          </div>
        </div>
      </div>
</div>
