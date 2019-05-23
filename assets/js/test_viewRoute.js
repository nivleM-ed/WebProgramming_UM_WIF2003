function viewEvent(){
    '<div id="r' + count + '" class="draggable route-row stay-row  first">' +
      '<div class="left">' +
      '<div class="marker notranslate">' + count + '</div>' +
      '<div class="line"></div>' +
      '</div>' +
      '<div class="content" >' +
      '<div class="title">' + value + '</div>' +
      '<span class="line-hr"></span>' +
      '<svg class="edit stay-icon" for="r' + count + '" title="Edit destination">' +
      '<use xlink:href="#icon-edit"></use>' +
      '</svg>' +
      '</div>' +
      '</div>  ');
}