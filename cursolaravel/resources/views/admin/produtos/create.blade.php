  <!-- Modal Structure -->
  <div id="create" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">playlist_add_circle</i> Novo Produto</h4>
      <form action="{{route('admin.produto.store')}}" class="col s12" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_user" value="{{auth()->user()->id}}">
        <div class="row">
            <div class="input-field col s6">
                <input name="nome" type="text" id="nome" class="validate">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s6">
                <input type="number" id="preco" name="preco" class="validate">
                <label for="preco">Preço</label>
            </div>
            <div class="input-field col s12">
                <input type="text" id="descricao" name="descricao" class="validate">
                <label for="descricao">Descricao</label>
            </div>

            <div class="input-field col s12">
                <select name="id_categoria">
                    <option value="" disabled selected>Escolha uma opção</option>
                    @foreach ($categorias as $c)
                    <option value="{{$c->id}}">{{$c->nome}}</option>
                    
                    @endforeach
                </select>
                <label for="">Categoria</label>
            </div>
            <div class="file-field input-field col s12">
                <div class="btn">
                  <span>Imagem</span>
                  <input type="file" name="imagem">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
              </div>
            <button type="submit"  class=" waves-effect waves-green btn green right">Cadastrar</button>
        </div>
      </form>
    </div>
  </div>