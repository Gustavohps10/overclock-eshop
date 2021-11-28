new Morris.Line({
    element: 'chart-1',
    data: [
      { year: '2017', a: 17, b: 5},
      { year: '2018', a: 10, b: 17 },
      { year: '2019', a: 5 , b: 22},
      { year: '2020', a: 5 , b: 14},
      { year: '2021', a: 15, b: 9}
    ],
    xkey: 'year',
    ykeys: ['a', 'b'],
    lineColors: ['#3f51b5', '#009688'],
    labels: ['Month', 'Test'],
    resize: true
});

new Morris.Bar({
    element: 'chart-2',
    data: [
      { year: '2017', a: 17, b: 5},
      { year: '2018', a: 10, b: 17 },
      { year: '2019', a: 5 , b: 22},
      { year: '2020', a: 5 , b: 14},
      { year: '2021', a: 15, b: 9}
    ],
    xkey: 'year',
    ykeys: ['a', 'b'],
    barColors: ['#3f51b5', '#009688'],
    labels: ['Month', 'Test'],
    resize: true
});


Morris.Donut({
    element: 'chart-3',
    data: [
      {label: "Download Sales", value: 12},
      {label: "In-Store Sales", value: 30},
      {label: "Mail-Order Sales", value: 20}
    ],
    colors: ['#3f51b5', '#009688', '#f44336'],
    resize: true
  });