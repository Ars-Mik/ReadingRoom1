<table class="list-books" style="width:100%; border-collapse: separate;">
    <tr>
      <th>№</th>
      <th>Шифр</th>
      <th>Номер фонда</th>
      <th>Номер описи</th>
      <th>Заголовок</th>
      <th>Действие</th>
    </tr>
  </table>

<script>
  $(window).on("load", function() {
    let count = 1;

    $($('.pagination-result').find('p')).find('span').html(<?php echo count($json[0])?>);
    $('.list-books').append(`
        @foreach ($json[0] as $item)
          <tr>
            <td>${count++}</td>
            <td>Ф. {{$item->numberFund}} Оп. 4 Д. 3</td>
            <td>{{$item->numberFund}}</td>
            <td>Ф.716 Оп. 4</td>
            <td>{{$item->documentName}}</td>
            <td><a href="">Открыть документ</a></td>
          </tr>
        @endforeach
    `);


    if ('<?php $json0 = json_encode($json[0]); echo $json0 ?>' !== '[]') {
      $($('.pagination-result').find('p')).find('span').html(<?php echo count($json[0])?>);
      let count = 1;
      $('.list-books').html(`
        @foreach ($json[0] as $item)
          <tr>
            <td>${count++}</td>
            <td>Ф. {{$item->numberFund}} Оп. 4 Д. 3</td>
            <td>{{$item->numberFund}}</td>
            <td>Ф.716 Оп. 4</td>
            <td>{{$item->documentName}}</td>
            <td><a href="{{$item->fileName}}">Открыть документ</a></td>
          </tr>
        @endforeach
      `);
    }

  });
</script>


  <div class="list-pagination">
    <div class="pagination">
      <span class="previous-pagination number"><img src="{{ Vite::asset('resources/img/left.svg') }}" alt="left"></span>
        <div class="pagination-number">
          <a href="#" class="number active">1</a>
          <a href="#" class="number">2</a>
          <a href="#" class="number">3</a>
          <a href="#" class="number">4</a>
          <a href="#" class="number">5</a>
          <span href="#" class="dots number">...</span>
          <a href="#" class="number">99</a>
        </div>
      <a href="#" class="next-pagination number"><img src="{{ Vite::asset('resources/img/right.svg') }}" alt="right"></a>
    </div>
  </div>
