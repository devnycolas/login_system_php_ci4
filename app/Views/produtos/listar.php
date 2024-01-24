<div class="modal fade" id="modal-novo-produto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="/produtos/cadastrar" method="post">
            <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h4 class="modal-title">Novo Produto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Nome</label>
                                <input type="text" class="form-control" name="Nome">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Qtde</label>
                                <input type="text" class="form-control" name="Qtde">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Valor</label>
                                <input type="text" class="form-control" name="Valor">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-editar-produto">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="/produtos/editar" method="post">
                <input type="hidden" name="_method" value="PUT">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Produto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Nome</label>
                                <input type="text" class="form-control" id="modal-editar-produto-Nome" name="Nome">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Qtde</label>
                                <input type="text" class="form-control" id="modal-editar-produto-Qtde" name="Qtde">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Valor</label>
                                <input type="text" class="form-control" id="modal-editar-produto-Valor" name="Valor">
                            </div>
                        </div>

                        <input type="hidden" id="modal-editar-produto-ProdutoId" name="ProdutoId">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Produtos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Produtos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-info" id="btn-novo-produto">
                            <i class="fas fa-plus-circle"></i> Novo Produto
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php if(session()->has('messageSuccessCreate')):  ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
                        <?php echo session()->getFlashdata('messageSuccessCreate') ?? '' ?>
                    </div>
                </div>
            </div>
        <?php  endif; ?>
        <?php if(session()->has('messageSuccessDelete')):  ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Deletado!</h5>
                        <?php echo session()->getFlashdata('messageSuccessDelete') ?? '' ?>
                    </div>
                </div>
            </div>
        <?php  endif; ?>
        <?php if(session()->has('messageSuccessEdit')):  ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Editado!</h5>
                        <?php echo session()->getFlashdata('messageSuccessEdit') ?? '' ?>
                    </div>
                </div>
            </div>
        <?php  endif; ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>CÓDIGO:</th>
                                    <th>NOME:</th>
                                    <th>QUANTIDADE:</th>
                                    <th>VALOR:</th>
                                    <th>AÇÕES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($produtos as $prod): ?>
                                    <tr>
                                        <td><?= $prod['ProdutoId'] ?></td>
                                        <td><?= $prod['Nome'] ?></td>
                                        <td><?= $prod['Qtde'] ?></td>
                                        <td><?= $prod['Valor'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning" onclick="prepararDados('<?= $prod['ProdutoId'] ?>', '<?= $prod['Nome'] ?>', '<?= $prod['Qtde'] ?>', '<?= $prod['Valor'] ?>')"><i class="fas fa-edit"></i></button>
                                            <!-- <a href="/produtos/excluir/<?= $prod['ProdutoId'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a> -->
                                            <form action="/produtos/excluir/<?= $prod['ProdutoId'] ?>" method="post" style="display:inline;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    <script>
        function prepararDados(ProdutoId, Nome, Qtde, Valor) {
            document.getElementById('modal-editar-produto-ProdutoId').value = ProdutoId;
            document.getElementById('modal-editar-produto-Nome').value = Nome;
            document.getElementById('modal-editar-produto-Qtde').value = Qtde;
            document.getElementById('modal-editar-produto-Valor').value = Valor;

            $('#modal-editar-produto').modal('show');
        }
    </script>