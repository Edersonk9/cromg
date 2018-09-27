<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FilmeM;
use App\PessoaM;

class FilmeC extends Controller
{
  public $rota = ['rota'=>'filme'];

  public function carrega()  {
    $this->rota[$this->rota['rota']] = FilmeM::where('status','>',0)->get();
    $this->rota['pessoas'] = PessoaM::where('status','>',0)->get();
  }

  public function index()
  {
    $this->carrega();

    return view($this->rota['rota'], ['rota'=>$this->rota]);
  }

  public function show($id)
  {
    $this->rota[$this->rota['rota']] = FilmeM::where('status','>',0)
                                             ->where('id_pessoa',$id)->get();
    $this->rota['pessoas'] = PessoaM::where('status','>',0)->get();

    return view($this->rota['rota'], ['rota'=>$this->rota]);
  }

  public function store(Request $request, FilmeM $id)  {
    $id->create($request->all());

    return redirect()->back()->with(['success' => 'Cadastrado com sucesso.']);
  }

  public function edit($id)
  {
    $this->carrega();
    $this->rota['edit'] = FilmeM::findOrFail($id);

    return view($this->rota['rota'], ['rota'=>$this->rota]);
  }

  public function update(Request $request, $id)
  {
    $id = FilmeM::findOrFail($id);
    $id->update($request->all());

    return redirect()->route($this->rota['rota'].'.index')->with(['success' => $this->rota['rota'].' alterado com sucesso.']);
  }

  public function destroy($id)
  {
    $id = FilmeM::findOrFail($id);
    $id->update(['sts_'.$this->rota['rota'] => 0]);

    return redirect()->route($this->rota['rota'].'.index')->with(['success' => $this->rota['rota'].' excluído com sucesso.']);
  }
}
