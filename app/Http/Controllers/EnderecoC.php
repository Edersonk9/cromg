<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EnderecoM;
use App\PessoaM;

class EnderecoC extends Controller
{
  public $rota = ['rota'=>'endereco'];

  public function carrega()  {
    $this->rota[$this->rota['rota']] = EnderecoM::where('status','>',0)->get();
    $this->rota['pessoas'] = PessoaM::where('status','>',0)->get();
  }

  public function end_principal($id)  {
    $idU = EnderecoM::where('id_pessoa', $id);
    $idU->update(['principal' => 0]);
  }

  public function index()
  {
    $this->carrega();

    return view($this->rota['rota'], ['rota'=>$this->rota]);
  }

  public function show($id)
  {
    $this->rota['pessoas'] = PessoaM::where('status','>',0)->get();
    $this->rota[$this->rota['rota']] = EnderecoM::where('status','>',0)
                                                ->where('id_pessoa',$id)->get();

    return view($this->rota['rota'], ['rota'=>$this->rota]);
  }

  public function store(Request $request, EnderecoM $id)
  {
    if($request->principal == 1)
      $this->end_principal($request['id_pessoa']);

    $id->create($request->all());

    return redirect()->back()->with(['success' => 'Cadastrado com sucesso.']);
  }

  public function edit($id)
  {
    $this->carrega();
    $this->rota['edit'] = EnderecoM::findOrFail($id);

    return view($this->rota['rota'], ['rota'=>$this->rota]);
  }

  public function update(Request $request, $id)
  {
    if($request->principal == 1)
    $this->end_principal($request['id_pessoa']);

    $id = EnderecoM::findOrFail($id);
    $id->update($request->all());

    return redirect()->route($this->rota['rota'].'.index')->with(['success' => $this->rota['rota'].' alterado com sucesso.']);
  }

  public function destroy($id)
  {
    $id = EnderecoM::findOrFail($id);
    $id->update(['sts_'.$this->rota['rota'] => 0]);

    return redirect()->route($this->rota['rota'].'.index')->with(['success' => $this->rota['rota'].' excluído com sucesso.']);
  }
}
