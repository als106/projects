@extends('layouts.layout')

@section('title', 'Crear pedido')

@section('content')
<div class="container my-4">
  <div class="card">
    <div class="card-body" style="background-color: #EDE4DB;">
    <h2 class="card-title">Bienvenido a Vinyl Oasis</h2>
    <p class="card-text">En nuestro sitio web encontrarás una amplia selección de discos de vinilo de todas las épocas y géneros, 
        desde clásicos del rock y del jazz hasta rarezas del indie y del soul, todos ellos cuidadosamente seleccionados por nuestro equipo de expertos en música.</p>

    <p class="card-text">En Vinyl Oasis, nos esforzamos por ofrecerte una experiencia de compra fácil y agradable. 
    Podrás navegar por nuestra selección de vinilos de manera intuitiva y eficiente, utilizando nuestros filtros y 
    categorías para encontrar el disco que buscas. Además, también podrás acceder a nuestras novedades, 
    y descubrir nuevos artistas y álbumes que podrían interesarte.</p>

    <p class="card-text">En Vinyl Oasis, sabemos que la calidad es importante, por eso trabajamos con los mejores proveedores 
    y sellos discográficos para asegurarnos de que todos los vinilos que ofrecemos sean de la mejor calidad posible. 
    También nos aseguramos de que los envíos se realicen de manera rápida y segura, para que puedas disfrutar de tu vinilo lo antes posible.</p>

    <p class="card-text">¡Gracias por visitar Vinyl Oasis, esperamos que encuentres el vinilo perfecto para tu colección musical!</p>

  <h3>TE INVITAMOS A VISITAR NUESTRA TIENDA EN ALICANTE</h3>
  <div class="d-flex align-items-center">
    <img src="{{ asset('img/Vinyl-Shop.jpg') }}" alt="Imagen tienda" width="500">
    <div class="ml-3">
        <p>lun - vie 9 - 20.30</p>
        <p>sab 9 - 21</p>
        <p>Carrer Portugal, 39 03003 Alicante</p>
        <div class="map-responsive">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3109.801750904156!2d-0.49387490000000003!3d38.343210000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd62364c41e1da79%3A0x31d137b0731d6889!2sC.%20Portugal%2C%2039%2C%2003003%20Alicante%20%28Alacant%29%2C%20Alicante!5e0!3m2!1sen!2ses!4v1620736669648!5m2!1sen!2ses" 
          width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>

</div>

    </div>
  </div>
</div>




@endsection