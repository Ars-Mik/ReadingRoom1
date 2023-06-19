

<div class="table-title-fond">
  <h3 class="fs-3 title-fond">Все фонды</h3>
  <hr/>
  
</div>
<table class="list-books container" style="width:100%; border-collapse: separate; margin-top: 2rem;">
    <tr>
      <th width="228px">№ фонда</th>
      <th width="685px">Название</th>
      <th width="300px">Начальная дата</th>
      <th width="244px">Конечная дата</th>
      <th width="260px">Количество дел</th>
    </tr>

    
</table>

<script>
  $(window).on("load", function() {
    $('.list-books').append(`
        @foreach ($json[0] as $item)
          <tr>
            <td width="228px" style="color: black;">{{$item->id}}</td>
            <td width="685px" style="text-align: left; text-decoration: underline; color: black;"><a href="fund/{{$item->id}}">{{$item->fundName}}</a></td>
            <td width="300px" style="color: black;">{{$item->startDate}}</td>
            <td width="244px">{{$item->endDate}}</td>
            <td width="260px">8</td>
          </tr>
        @endforeach
    `);
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
