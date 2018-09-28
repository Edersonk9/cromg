@extends('layouts.cromg')

@section('content')
  @php //dd($rota['edit']->nome);
  $idU = $idT = 0;
  if(isset($rota['edit'])) {
    $idU = $rota['edit']->id_und;
    $idT = $rota['edit']->id_mrp_tipo;
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
                  <div class="col-md-8 col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputName2">Pessoas </label>
                    </div>
                  </div>
                  {{-- FORM CAD --}}
                  <div class="col-md-1 col-xs-12">
                        <button id="btn-plus" type="button" class="btn btn-pill btn-outline-success ml-3" onclick="Mostra_form_table('{{$rota['rota']}}')">
                          <i class='fa fa-plus'></i>
                        </button>
                  </div>
                  {{-- FORM CAD --}}
                </div>

                  <div id="div-cad-{{$rota['rota']}}" style="display: {{isset($rota['edit'])?'':'none'}}">
                    <div class="row">

                      <div class="col-md-4 col-xs-12">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Nome</span>
                          </div>
                          <input type="text" name="nome" class="form-control" value="{{ isset($rota['edit'])?$rota['edit']->nome:'' }}" oninput="this.value = this.value.toUpperCase()">
                        </div>
                      </div>

                      <div class="col-md-4 col-xs-12">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Sobrenome</span>
                          </div>
                          <input type="text" name="sobrenome" class="form-control" value="{{ isset($rota['edit'])?$rota['edit']->sobrenome:'' }}" oninput="this.value = this.value.toUpperCase()">
                        </div>
                      </div>

                      <div class="col-md-3 col-xs-12">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Titulação</span>
                          </div>
                          <input type="text" name="titulacao" class="form-control" value="{{ isset($rota['edit'])?$rota['edit']->titulacao:'' }}" oninput="this.value = this.value.toUpperCase()">
                        </div>
                      </div>

                    </div>

                    <div id="div-cad-modelo" class="row mt-3">
                      <div class="col-md-3 col-xs-12">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" title="Código do item">CPF</span>
                          </div>
                          <input type="text" name="cpf" class="form-control" value="{{ isset($rota['edit'])? $rota['edit']->cpf:'' }}" onkeydown="javascript: fMasc( this, mCPF );">
                        </div>
                      </div>

                      <div class="col-md-3 col-xs-12">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">RG</span>
                          </div>
                          <input type="text" name="rg" class="form-control" value="{{ isset($rota['edit'])?$rota['edit']->rg:'' }}" onkeydown="javascript: fMasc( this, mRG );">
                        </div>
                      </div>

                      <div class="col-md-5 col-xs-12">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">E-Mail</span>
                          </div>
                          <input type="text" name="email" class="form-control" value="{{ isset($rota['edit'])?$rota['edit']->email:'' }}">
                        </div>
                      </div>

                  </div>

                    <div class="row mt-3">

                      <div class="col-md-2 col-xs-12">
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
                        Código
                      </th>
                      <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending">
                        {{ ucfirst($rota['rota']) }}
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">
                        Modelo
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 160px;">
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
                          {{ $key->nome }}
                          <a href="#" class="card-header-action btn-maximize" data-toggle="collapse" data-target="#coll-{{$key['id_'.$rota['rota']]}}, #coll-{{$key['id_'.$rota['rota']]}}-1, #coll-{{$key['id_'.$rota['rota']]}}-2" aria-expanded="true">
                            <i class="fa fa-search-plus"></i>
                          </a>

                          <div class="collapse close col-12" id="coll-{{$key['id_'.$rota['rota']]}}" >
                            <div class="">
                              <h6>
                                Sobrenome: {{ $key->sobrenome }} <br>
                              </h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          {{ $key->titulacao }}
                          <div class="collapse close col-12" id="coll-{{$key['id_'.$rota['rota']]}}-1" >
                            <div class="">
                              <h6>
                                CPF: {{ $key->cpf }} <br>
                              </h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          {{ $key->email }}
                          <div class="collapse close col-12" id="coll-{{$key['id_'.$rota['rota']]}}-2" >
                            <div class="">
                              <h6>
                                RG: {{ $key->rg }} <br>
                              </h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          {{-- ACL ACOES TABLE --}}
                          <div class="row">
                              <div class="">
                                <a href="{{route('endereco.show',$key['id_'.$rota['rota']]) }}" class="btn btn-block btn-info" title="Abrir endereços">
                                  <i class="fa fa-search"></i>
                                </a>
                              </div>

                              <div class="ml-2">
                                <a href="{{route('filme.show',$key['id_'.$rota['rota']]) }}" class="btn btn-block btn-info" title="Abrir filmes">
                                  <i class="fa fa-list"></i>
                                </a>
                              </div>

                              <div class="ml-2">
                                <a href="{{route($rota['rota'].'.edit',$key['id_'.$rota['rota']]) }}" class="btn btn-block btn-warning" title="Editar">
                                  <i class="fa fa-edit"></i>
                                </a>
                              </div>

                              <div class="ml-2">
                                <form method="POST" action="{{route($rota['rota'].'.destroy',$key['id_'.$rota['rota']]) }}">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-block btn-danger" title="Excluir" onclick="return confirm('Confirma a exclusão?')">
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
