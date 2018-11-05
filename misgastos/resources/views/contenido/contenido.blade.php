@extends('principal')
@section('contenido')
    <template v-if="menu==0">
    <h1>Contenido del Menu 0</h1>
    </template>

    <template v-if="menu==1">
    <h1>Contenido del Menu 1</h1>        
    </template>

    <template v-if="menu==2">
        <rubro></rubro>       
    </template>

    <template v-if="menu==3">
        <subrubro></subrubro>
    </template>

    <template v-if="menu==4">
        <h1>Contenido del Menu 4 - Libro de Bancos</h1>
    </template>

    <template v-if="menu==5">
        <h1>Contenido del Menu 5</h1>
    </template>

    <template v-if="menu==6">
        <h1>Contenido del Menu 6</h1>
    </template>

    <template v-if="menu==7">
        <h1>Contenido del Menu 7 Informes</h1>
    </template>

    <template v-if="menu==15">
        <h1>Contenido del Menu 15</h1>
    </template>

    <template v-if="menu==16">
        <h1>Contenido del Menu 16</h1>
    </template>

    <template v-if="menu==17">
        <h1>Contenido del Menu 17</h1>
    </template>

    <template v-if="menu==18">
        <h1>Contenido del Menu 18</h1>
    </template>

        
@endsection