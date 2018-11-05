<template>
   <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">                
                <li class="breadcrumb-item"><a href="/">Escritorio</a></li>               
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> SubRubros
                        <button type="button" @click="abrirModal('subrubro','registrar')" class="btn btn-secondary">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio" >
                                      <option value="subrubro">SubRubro</option>
                                      <option value="rubro">Rubro</option>
                                    </select>                                      
                                    <input type="text" v-model="buscar" @keyup.enter="listarSubRubro(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit"  @click="listarSubRubro(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>SubRubro</th>
                                    <th>Rubro</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="subrubro in arraySubRubro" :key="subrubro.id">
                                    <td v-text="subrubro.subrubro"></td>                                    
                                    <td>
                                        <div v-if="subrubro.condicion">
                                          <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else>
                                          <span class="badge badge-danger">Desactivado</span>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" @click="abrirModal('subrubro','actualizar',subrubro)" class="btn btn-warning btn-sm">
                                          <i class="icon-pencil"></i>
                                        </button> &nbsp;
                                        <template v-if="subrubro.condicion">
                                            <button type="button" class="btn btn-danger btn-sm" @click="desactivarSubRubro(subrubro.id)">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </template>
                                        <template v-else>
                                            <button type="button" class="btn btn-info btn-sm" @click="activarsubRubro(subrubro.id)">
                                                <i class="icon-check"></i>
                                            </button>
                                        </template>
                                    </td>
                                    <td v-text="subrubro.subrubro"></td>
                                    <td v-text="subrubro.rubro"></td>
                                    
                                </tr>
                             
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item" v-if="pagination.current_page > 1">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Ant</a>
                                </li>
                                <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : ' ']">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"> </a>
                                </li>                              
                                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Sig</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar/actualizar-->
            <div class="modal fade"  tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" v-text="tituloModal"></h4>
                            <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                              <span aria-hidden="true">X</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Rubro</label>
                                    <div class="col-md-9">
                                        <select class="form-contrl" v-model="rubro">
                                            <option value="0" disable>Seleccione</option>
                                            <option v-for="rubro in arrayRubro" :key="rubro.id" :value="rubro.id" v-text="rubro.rubro">Seleccione</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">SubRubro</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="Subrubro" class="form-control" placeholder="Descripción del Subrubro">
                                        
                                    </div>
                                </div>
                                <div v-show="errorRubro" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjSubRubro" :key="error" v-text="error">

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarRubro()">Guardar</button>
                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarRubro()">Actualizar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->
            
           
        </main>
 
</template>

<script>
    export default {
        data (){
            return {
                subrubro_id: 0,
                idrubro: 0,
                subrubro: '',                
                arraySubRubro : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorSubRubro : 0,
                errorMostrarMsjSubRubro : [],
                pagination : {
                    'total'        :0,
                    'current_page' :0,
                    'per_page'     :0,
                    'last_page'    :0,
                    'from'         :0,
                    'to'           :0,            
                },
                offset : 3,
                criterio : 'subrubro',   //nombre del campo a buscar
                buscar : 0,
                arrayRubro : []
            }
        },
        computed : {
            isActived: function(){
                return this.pagination.current_page;
            },
            //Calcula los elementos de la paginacion
            pagesNumber: function(){
                if(!this.pagination.to) {
                    return [];
                }
                var from = this.pagination.current_page - this.offset;
                if(from < 1) {
                    from = 1;
                }
                var to = from + (this.offset * 2);
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }
                var pageArray = [];
                while(from <= to) {
                    pageArray.push(from);
                    from++;
                }
                return pageArray;
            }
        },
        methods : {
            listarsubRubro (page,buscar,criterio){
                let me=this;
                var url= '/subrubro?page=' + page + '&buscar=' + buscar + '&criterio=' + criterio ;
                axios.get(url).then(function (response) {
                    var respuesta = response.data;
                    me.arraysubRubro = respuesta.subrubros.data;
                    me.pagination = respuesta.pagination;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
            },
            selectRubro(){
                let me=this;
                var url= '/rubro/selectRubro';
                axios.get(url).then(function (response) {
                    var respuesta = response.data;
                    me.arrayRubro = respuesta.rubros;                   
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
            },
            cambiarPagina(page,buscar,criterio){
                let me = this;
                //actualiza la pagina actual
                me.pagination.current_page = page;
                //Envia la peticion para visualizar la data de esa pagina
                me.listarsubRubro(page,buscar,criterio);
            },
            registrarSubRubro(){
                if (this.validarSubRubro()) {
                    return;
                }
                let me = this;
                axios.post('/subrubro/registrar', {
                    'subrubro' : this.subrubro
                })
                .then(function (response) {
                    me.cerrarModal();
                    me.listarSubRubro(1,'','subrubro');
                })
                .catch(function (error) {
                    console.log(error);
                });                
            },
            actualizarSubRubro(){
                if (this.validarSubRubro()) {
                    return;
                }
                let me = this;
                axios.put('/subrubro/actualizar', {
                    'subrubro' : this.subrubro,
                    'id': this.subrubro_id
                })
                .then(function (response) {
                    me.cerrarModal();
                    me.listarSubRubro(1,'','subrubro');
                })
                .catch(function (error) {
                    console.log(error);
                });                
            },
            desactivarSubRubro(id){                     
                swal({
                title: 'Está seguro de desactivar este Subrubro?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, Aceptar!',
                cancelButtonText: 'Cancelar',
                }).then((result) => {
                if (result.value) {
                    let me = this;
                    axios.put('/subrubro/desactivar', {                        
                        'id': id
                    })
                    .then(function (response) {                       
                        me.listarSubRubro(1,'','subrubro');
                        swal(
                        'Desactivado!',
                        'El registro ha sido desactivado con éxito.',
                        'success'
                        )
                    })
                    .catch(function (error) {
                        console.log(error);
                    });                       
                }
                })                
            },
            activarSubRubro(id){                     
                swal({
                title: 'Está seguro de activar este Subrubro?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, Aceptar!',
                cancelButtonText: 'Cancelar',
                }).then((result) => {
                if (result.value) {
                    let me = this;
                    axios.put('/subrubro/desactivar', {                        
                        'id': id
                    })
                    .then(function (response) {                       
                        me.listarSubRubro(1,'','subrubro');
                        swal(
                        'Activado!',
                        'El registro ha sido activado con éxito.',
                        'success'
                        )
                    })
                    .catch(function (error) {
                        console.log(error);
                    });                       
                }
                })                
            },
            validarSubRubro(){
                this.errorSubRubro = 0;
                this.errorMostrarMsjSubRubro = [];
                if (!this.Subrubro) this.errorMostrarMsjSubRubro.push("El campo SubRubro no puede estar vacio.");
                if (this.errorMostrarMsjSubRubro.length) this.errorSubRubro = 1;
                return this.errorSubRubro;
            },
            cerrarModal(){
                this.modal = 0;
                this.tituloModal = '';
                this.subrubro = '';
                
            },
            abrirModal(modelo, accion, data=[]){
                switch(modelo){
                    case "subrubro":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar SubRubro';
                                this.Subrubro = '';                                
                                this.tipoAccion = 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                 this.modal = 1;
                                this.tituloModal = 'Actualizar SubRubro';                                
                                this.tipoAccion = 2;
                                this.subrubro_id = data['id'];
                                this.subrubro = data['subrubro'];
                                break;
                            }
                        }
                    }
                }
                this.selectRubro();
            }
        },
        mounted() {
            this.listarSubRubro(1,this.buscar,this.criterio);
        }
    }
</script>
<style>
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
    }
    .div-error{
        display: flex;
        justify-content: center;
    }
    .text-error{
        color: red !important;
        font-weight: bold;
    }
</style>
