<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-secondary">Novo Médico</button>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6 col-sm-12">
        <div class="float-left">
            <label class="registro" for="exampleFormControlSelect1">Registros</label>
            <select class="form-control-sm" id="exampleFormControlSelect1">
                <option>10</option>
                <option>25</option>
                <option>50</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="float-right mr-4">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control-sm mr-sm-2" type="search" placeholder="Nome ou CRM" aria-label="Pesquisar" name="txtbuscar">
                <button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" type="submit" name="<?php echo $item2; ?>"><i class="fas fa-search"></i></button>
            </form>
        </div>  
    </div>
</div>
