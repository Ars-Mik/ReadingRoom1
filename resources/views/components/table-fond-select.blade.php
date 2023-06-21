<table class="list-books container-fluid" style="width:100%; border-collapse: separate; margin-top: 2rem;">
    <tr>
      <th width="228px">№</th>
      <th width="945px">Название</th>
      <th width="249px">Номер дела</th>
      <th width="244px">Действие</th>
    </tr>

   

</table>
<script>
  $(window).on("load", function() {
    let count = 1;

    $('.list-books').append(`
        @foreach ($json[0] as $item)
          <tr>
            <td style="color: black;">${count++}</td>
            <td style="text-align: left; text-decoration: underline; color: black;">{{$item->documentName}}</td>
            <td style="color: black;">{{$item->caseNumber}}</td>
            <td><a href="/about_document/{{$item->id}}">Открыть документ</a></td>
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
