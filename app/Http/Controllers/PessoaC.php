<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PessoaM;

class PessoaC extends Controller
{
  public $rota = ['rota'=>'pessoa'];

  public function carrega()  {
    $this->rota[$this->rota['rota']] = PessoaM::where('status','>',0)->get();
  }

  public function index()
  {
    $this->carrega();

    return view($this->rota['rota'], ['rota'=>$this->rota]);
  }

  public function store(Request $request, PessoaM $id)  {
    $id->create($request->all());

    return redirect()->back()->with(['success' => 'Cadastrado com sucesso.']);
  }

  public function edit($id)
  {
    $this->carrega();
    $this->rota['edit'] = PessoaM::findOrFail($id);

    return view($this->rota['rota'], ['rota'=>$this->rota]);
  }

  public function update(Request $request, $id)
  {
    $chars = array(".","/","-");

    $data = $request->all();
    $data['cpf'] = str_replace($chars,"",$data['cpf']);
    $id = PessoaM::findOrFail($id);
    $id->update($request->all());

    return redirect()->route($this->rota['rota'].'.index')->with(['success' => $this->rota['rota'].' alterado com sucesso.']);
  }

  public function destroy($id)
  {
    $id = PessoaM::findOrFail($id);
    $id->update(['sts_'.$this->rota['rota'] => 0]);

    return redirect()->route($this->rota['rota'].'.index')->with(['success' => $this->rota['rota'].' excluído com sucesso.']);
  }
}
