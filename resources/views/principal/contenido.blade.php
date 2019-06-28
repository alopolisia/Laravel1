
@extends('principal')
@section('contenido')

    <template v-if="menu==0">
      Nada
    </template>

    <template v-if="menu==1">
      <categoria-component></categoria-component>
    </template>

    <template v-if="menu==2">
      <h2>Contenido del Menú 2</h2>
    </template>

    <template v-if="menu==3">
      <usuarios-component></usuarios-component>
    </template>

    <template v-if="menu==4">
      <h2>Contenido del Menú 4</h2>
    </template>

    <template v-if="menu==5">
      <h2>Contenido del Menú 5</h2>
    </template>

    <template v-if="menu==6">
      <h2>Contenido del Menú 6</h2>
    </template>

    <template v-if="menu==7">
      <h2>Contenido del Menú 7</h2>
    </template>

    <template v-if="menu==8">
      <h2>Contenido del Menú 1</h2>
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