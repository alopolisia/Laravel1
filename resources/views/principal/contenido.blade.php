
@extends('principal')
@section('contenido')

    <template v-if="menu==0">
      Nada
    </template>

    <template v-if="menu==1">
      <categoria-component></categoria-component>
    </template>

    <template v-if="menu==2">
      <articulo-component></articulo-component>
    </template>

    <template v-if="menu==3">
      <ingreso-component></ingreso-component>
    </template>

    <template v-if="menu==4">
      <proveedor-component></proveedor-component>
    </template>

    <template v-if="menu==5">
      <venta-component></venta-component>
    </template>

    <template v-if="menu==6">
      <cliente-component></cliente-component>
    </template>

    <template v-if="menu==7">
      <h2>Contenido del Menú 7</h2>
    </template>

    <template v-if="menu==8">
      <rol-component></rol-component>
    </template>

    <template v-if="menu==9">
      <h2>Contenido del Menú 1</h2>
    </template>

    <template v-if="menu==10">
      <h2>Contenido del Menú 1</h2>
    </template>

    <template v-if="menu==11">
      <h2>Contenido del Menú 1</h2>
    </template>

@endsection