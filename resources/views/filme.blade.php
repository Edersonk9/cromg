@extends('layouts.cromg')

@section('content')
  @php //dd($rota['edit']->nome);
  $idP = 0;
  if(isset($rota['edit'])) {
    $idP = $rota['edit']->id_pessoa;
  }
  @endphp
  <main class="main">
    <br>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-12">

          @component('includes/alerts')
          @endcomponent

          <div class="card">
            {{-- FORM CADASTRO --}}
            <div class="card-header">
              @if (isset($rota['edit']))
                <form action="{{ route($rota['rota'].'.update',$rota['edit']['id_'.$rota['rota']]) }}" method="post" class="form">
                @method('PUT')
              @else
                <form action="{{ route($rota['rota'].'.store') }}" method="post" class="form">
                @endif
                @csrf
                <div class="row justify-content-between">
                  <div class="col-8">
                    <div class="form-group">
                      <label for="exampleInputName2">Filmes assistidos </label>
                    </div>
                  </div>
                  {{-- ACL FORM CAD --}}
                  <div class="col-1">
                        <button id="btn-plus" type="button" class="btn btn-pill btn-outline-success ml-3" onclick="Mostra_form_table('{{$rota['rota']}}')">
                          <i class='fa fa-plus'></i>
                        </button>
                  </div>
                  {{-- ACL FORM CAD --}}
                </div>

                  <div id="div-cad-{{$rota['rota']}}" style="display: {{isset($rota['edit'])?'':'none'}}">
                    <div class="row">

                      <div class="col-3">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Pessoa</span>
                          </div>
                          <select id="selectTipoProd" name="id_pessoa" class="form-control" required>
                            <option value="" {{ $idP == 0 ? 'selected':''}}>Selecione ...</option>
                            @foreach ($rota['pessoas'] as $key)
                              <option value="{{ $key->id_pessoa }}" {{ $idP == $key->id_pessoa ? 'selected':''}}>{{ $key->nome }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="col-5">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Título</span>
                          </div>
                          <input type="text" name="titulo" class="form-control" value="{{ isset($rota['edit'])?$rota['edit']->titulo:'' }}" oninput="this.value = this.value.toUpperCase()" required>
                        </div>
                      </div>

                      <div class="col-4">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Lançamento</span>
                          </div>
                          <input type="number" name="lancamento" min="1895" max="{{ date('Y') }}" class="form-control" value="{{ isset($rota['edit'])?$rota['edit']->lancamento:'' }}" oninput="this.value = this.value.toUpperCase()">
                        </div>
                      </div>
                    </div>

                    <div id="div-cad-modelo" class="row mt-3">

                      <div class="col-4">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Diretor</span>
                          </div>
                          <input type="text" name="diretor" class="form-control" value="{{ isset($rota['edit'])?$rota['edit']->diretor:'' }}" oninput="this.value = this.value.toUpperCase()">
                        </div>
                      </div>

                      <div class="col-2">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" title="Código do item">Nota</span>
                          </div>
                          <input type="number" step="0.1" name="nota" class="form-control" value="{{ isset($rota['edit'])?$rota['edit']->nota:'' }}" oninput="this.value = this.value.toUpperCase()">
                        </div>
                      </div>

                      <div class="col-6">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Sinopse</span>
                          </div>
                          <textarea name="sinopse" rows="3" class="form-control">{{ isset($rota['edit'])?$rota['edit']->sinopse:'' }}</textarea>
                        </div>
                      </div>

                  </div>

                    <div class="row mt-3">

                      <div class="col-2">
                        <button type="submit" class="btn btn-outline-success btn-block" id="submit">
                          {{ isset($rota['edit'])?"Salvar":"Cadastrar"}}
                        </button>
                      </div>
                    </div>
                    <div class="row mt-3">

                    </div>

                  </div>
                </form>
              </div>
              {{-- END FORM --}}
              {{-- START LIST --}}
              <div class="car-body">
                {{-- DATATABLE --}}
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer mt-3">
                  <div id="div-list-{{$rota['rota']}}" style="display: {{isset($rota['edit'])?'none':''}}">

                  <table class="table table-striped table-hover datatable dataTable no-footer table-sm" id="DataTables_Table_1" role="grid"
                  aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                  <thead>
                    <tr role="row">
                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">
                        Filme
                      </th>
                      <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending">
                        Pessoa
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">
                        Ano
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">
                        Nota
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 79px;">
                        Ação
                      </th>
                    </tr>
                  </thead>
                </div>
                  {{-- LIST --}}
                  <tbody>
                    @foreach ($rota[$rota['rota']] as $key)
                      <tr>
                        <td>
                          {{ $key->titulo }}
                          <a href="#" class="card-header-action btn-maximize" data-toggle="collapse" data-target="#coll-{{$key['id_'.$rota['rota']]}}, #coll-{{$key['id_'.$rota['rota']]}}-1, #coll-{{$key['id_'.$rota['rota']]}}-2" aria-expanded="true">
                            <i class="fa fa-search-plus"></i>
                          </a>

                          <div class="collapse close col-12" id="coll-{{$key['id_'.$rota['rota']]}}" >
                            <div class="">
                              <h6>
                                Diretor: {{ $key->diretor }} <br>
                              </h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          {{ $key->pessoa->nome }}
                          <div class="collapse close col-12" id="coll-{{$key['id_'.$rota['rota']]}}-1" >
                            <div class="">
                              <h6>
                                Sinopse: {{ $key->sinopse }} <br>
                              </h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          {{ $key->lancamento }}
                        </td>
                        <td>
                          {{ $key->nota }}
                        </td>
                        <td>
                          {{-- ACL ACOES TABLE --}}
                          <div class="row">

                              <div class="">
                                <a href="{{route($rota['rota'].'.edit',$key['id_'.$rota['rota']]) }}" class="btn btn-block btn-warning" title="Editar">
                                  <i class="fa fa-edit"></i>
                                </a>
                              </div>

                              <div class="">
                                <form method="POST" action="{{route($rota['rota'].'.destroy',$key['id_'.$rota['rota']]) }}">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-block btn-danger ml-2" title="Excluir" onclick="return confirm('Confirma a exclusão?')">
                                    <i class="fa fa-trash"></i>
                                  </button>
                                </form>
                              </div>
                          </div>
                          {{-- ACL ACOES TABLE --}}
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">DOCUMENTO</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>One fine body…</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                  </div>

                </div>
              </div>

            </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </main>
@endsection
