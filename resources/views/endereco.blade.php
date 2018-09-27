@extends('layouts.cromg')

@section('content')
  @php
  $idP = $uf = 0;
  if(isset($rota['edit'])) {
    $idP = $rota['edit']->id_pessoa;
    $uf = $rota['edit']->uf;
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
                <input type="hidden" name="principal" value="0">
                <div class="row justify-content-between">
                  <div class="col-8">
                    <div class="form-group">
                      <label for="exampleInputName2">Endereços </label>
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

                      <div class="col-3">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">UF</span>
                          </div>
                          <select id="selectTipoProd" name="uf" class="form-control" required>
                            <option value="" {{ $uf == 0 ? 'selected':''}}>Selecione ...</option>
                            <option value="AC" {{ $uf == "AC" ? 'selected':''}}>Acre</option>
                            <option value="AL" {{ $uf == "AL" ? 'selected':''}}>Alagoas</option>
                            <option value="AP" {{ $uf == "AP" ? 'selected':''}}>Amapá</option>
                            <option value="AM" {{ $uf == "AM" ? 'selected':''}}>Amazonas</option>
                            <option value="BA" {{ $uf == "BA" ? 'selected':''}}>Bahia</option>
                            <option value="CE" {{ $uf == "CE" ? 'selected':''}}>Ceará</option>
                            <option value="DF" {{ $uf == "DF" ? 'selected':''}}>Distrito Federal</option>
                            <option value="ES" {{ $uf == "ES" ? 'selected':''}}>Espírito Santo</option>
                            <option value="GO" {{ $uf == "GO" ? 'selected':''}}>Goiás</option>
                            <option value="MA" {{ $uf == "MA" ? 'selected':''}}>Maranhão</option>
                            <option value="MT" {{ $uf == "MT" ? 'selected':''}}>Mato Grosso</option>
                            <option value="MS" {{ $uf == "MS" ? 'selected':''}}>Mato Grosso do Sul</option>
                            <option value="MG" {{ $uf == "MG" ? 'selected':''}}>Minas Gerais</option>
                            <option value="PA" {{ $uf == "PA" ? 'selected':''}}>Pará</option>
                            <option value="PB" {{ $uf == "PB" ? 'selected':''}}>Paraíba</option>
                            <option value="PR" {{ $uf == "PR" ? 'selected':''}}>Paraná</option>
                            <option value="PE" {{ $uf == "PE" ? 'selected':''}}>Pernambuco</option>
                            <option value="PI" {{ $uf == "PI" ? 'selected':''}}>Piauí</option>
                            <option value="RJ" {{ $uf == "RJ" ? 'selected':''}}>Rio de Janeiro</option>
                            <option value="RN" {{ $uf == "RN" ? 'selected':''}}>Rio Grande do Norte</option>
                            <option value="RS" {{ $uf == "RS" ? 'selected':''}}>Rio Grande do Sul</option>
                            <option value="RO" {{ $uf == "RO" ? 'selected':''}}>Rondônia</option>
                            <option value="RR" {{ $uf == "RR" ? 'selected':''}}>Roraima</option>
                            <option value="SC" {{ $uf == "SC" ? 'selected':''}}>Santa Catarina</option>
                            <option value="SP" {{ $uf == "SP" ? 'selected':''}}>São Paulo</option>
                            <option value="SE" {{ $uf == "SE" ? 'selected':''}}>Sergipe</option>
                            <option value="TO" {{ $uf == "TO" ? 'selected':''}}>Tocantins</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-2">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">CEP</span>
                          </div>
                          <input type="text" name="cep" class="form-control" value="{{ isset($rota['edit'])?$rota['edit']->cep:'' }}" onkeydown="javascript: fMasc( this, mCEP );">
                        </div>
                      </div>

                      <div class="col-2">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" title="Código do item">Principal</span>
                          </div>
                          <input type="checkbox" name="principal" value="1" class="form-control" {{ isset($rota['edit'])?$rota['edit']->principal == 1?'checked':'':'' }}>
                        </div>
                      </div>

                    </div>
                    <div id="div-cad-modelo" class="row mt-3">

                      <div class="col-5">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Cidade</span>
                          </div>
                          <input type="text" name="cidade" class="form-control" value="{{ isset($rota['edit'])?$rota['edit']->cidade:'' }}" oninput="this.value = this.value.toUpperCase()" required>
                        </div>
                      </div>

                      <div class="col-5">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Bairro</span>
                          </div>
                          <input type="text" name="bairro" class="form-control" value="{{ isset($rota['edit'])?$rota['edit']->bairro:'' }}" oninput="this.value = this.value.toUpperCase()">
                        </div>
                      </div>

                    </div>
                    <div id="div-cad-modelo" class="row mt-3">

                      <div class="col-4">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Logradouro</span>
                          </div>
                          <input type="text" name="logradouro" class="form-control" value="{{ isset($rota['edit'])?$rota['edit']->logradouro:'' }}" oninput="this.value = this.value.toUpperCase()">
                        </div>
                      </div>

                      <div class="col-2">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" title="Código do item">Numero</span>
                          </div>
                          <input type="text" name="numero" class="form-control" value="{{ isset($rota['edit'])?$rota['edit']->numero:'' }}" oninput="this.value = this.value.toUpperCase()">
                        </div>
                      </div>

                      <div class="col-4">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" title="Código do item">Complemento</span>
                          </div>
                          <input type="text" name="complemento" class="form-control" value="{{ isset($rota['edit'])?$rota['edit']->complemento:'' }}" oninput="this.value = this.value.toUpperCase()">
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
                  <div id="div-list-{{$rota['rota']}}" class="{{isset($rota['edit'])?'divClose':'divOpen'}}">

                  <table class="table table-striped table-hover datatable dataTable no-footer table-sm" id="DataTables_Table_1" role="grid"
                  aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                  <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending">
                        Pessoa
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">
                        Cidade
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">
                        Principal
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
                          {{ $key->pessoa->nome }}
                          <a href="#" class="card-header-action btn-maximize" data-toggle="collapse" data-target="#coll-{{$key['id_'.$rota['rota']]}}, #coll-{{$key['id_'.$rota['rota']]}}-1, #coll-{{$key['id_'.$rota['rota']]}}-2" aria-expanded="true">
                            <i class="fa fa-search-plus"></i>
                          </a>

                          <div class="collapse close col-12" id="coll-{{$key['id_'.$rota['rota']]}}" >
                            <div class="">
                              <h6>
                                Bairro: {{ $key->bairro }} <br>
                              </h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          {{ $key->cidade.'-'.$key->uf }}
                          <div class="collapse close col-12" id="coll-{{$key['id_'.$rota['rota']]}}-1" >
                            <div class="">
                              <h6>
                                Logradouro: {{ $key->logradouro.', '.$key->numero }} <br>
                              </h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          {{ $key->principal == 1?'SIM':'NÃO' }}
                          <div class="collapse close col-12" id="coll-{{$key['id_'.$rota['rota']]}}-2" >
                            <div class="">
                              <h6>
                                Complemento: {{ $key->complemento }} <br>
                              </h6>
                            </div>
                          </div>
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
