@extends('layouts.main')
@section('title')
    <title>Pemdes Sungai Belidak</title>
@endsection
@section('judul')
    <h3 class="text-center">Data Penduduk</h3>
@endsection
@section('container2')
    <p>
        Data Penduduk Desa Sui Belidak<br>
        Desa Sungai Belidak terdiri dari 4 dusun, 4 RW dan 18 RT, adapun dusun-dusun yang terdapat di Desa Sungai Belidak
        antara lain Dusun Karya Muda, Karya Maju, Karya Tani dan Karya Utama.<br>
        <br>
        Jumlah penduduk di desa Sungai Belidak hingga
        <script>
            document.write(new Date().getFullYear());
        </script> sebanyak {{ $total = $laki + $perempuan }} dengan perbandingan
        {{ $laki }} laki dan
        {{ $perempuan }}
        perempuan.<br>
    </p>
    <div style="width: 80%; margin: auto;">
        <div id="jeniskelamin"></div>
        <div id="agama"></div>
        <div id="pendidikan"></div>
        <div id="hub"></div>
    </div>
@endsection

@section('script')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    {{-- <script src="https://code.highcharts.com/modules/exporting.js"></script> --}}

    <script>
        Highcharts.chart('jeniskelamin', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            colors: ['#0FAFF3', '#FFC0CB'],
            title: {
                text: 'Perbandingan Jenis Kelamin'
            },
            tooltip: {
                headerFormat: '<b>{point.key}</b><br>',
                pointFormat: '{series.name}: {point.y} orang = <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Warga',
                colorByPoint: true,
                data: [{
                    name: 'Laki-laki',
                    y: {{ $laki }},
                }, {
                    name: 'Perempuan',
                    y: {{ $perempuan }},
                }]
            }]
        });
    </script>

    <script>
        Highcharts.chart('agama', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 15,
                    beta: 5,
                    depth: 70,
                    viewDistance: 25,
                }
            },
            colors: ['#009000', '#C162D8', '#EEB89D', '#E0E0E0', '#FFFF00', '#FF0000', '#808080'],
            title: {
                text: 'Agama'
            },
            xAxis: {
                categories: ['Islam', 'Kristen', 'Katholik', 'Hindu', 'Budha', 'Kong Hucu',
                    'Kepercayaan Terhadap Tuhan Yang Maha Esa'
                ]
            },
            yAxis: {
                title: {
                    enabled: false
                },
            },
            tooltip: {
                headerFormat: '<b>{point.key}</b><br>',
                pointFormat: '{point.y} Orang</b>'
            },
            plotOptions: {
                column: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Warga',
                colorByPoint: true,
                data: [{
                    name: 'Islam',
                    y: {{ $islam }},
                }, {
                    name: 'Kristen',
                    y: {{ $kristen }},
                }, {
                    name: 'Katholik',
                    y: {{ $katholik }},
                }, {
                    name: 'Hindu',
                    y: {{ $hindu }},
                }, {
                    name: 'Budha',
                    y: {{ $budha }},
                }, {
                    name: 'Kong Hucu',
                    y: {{ $konghucu }},
                }, {
                    name: 'Kepercayaan Terhadap Tuhan Yang Maha Esa',
                    y: {{ $kttyme }},
                }]
            }]
        });

        function showValues() {
            document.getElementById('alpha-value').innerHTML = chart.options.chart.options3d.alpha;
            document.getElementById('beta-value').innerHTML = chart.options.chart.options3d.beta;
            document.getElementById('depth-value').innerHTML = chart.options.chart.options3d.depth;
        }

        document.querySelectorAll('#sliders input').forEach(input => input.addEventListener('input', e => {
            chart.options.chart.options3d[e.target.id] = parseFloat(e.target.value);
            showValues();
            chart.redraw(false);
        }));
    </script>

    <script>
        Highcharts.chart('pendidikan', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'line'
            },
            colors: ['#CC0000', '#0000FF', '#FFC0CB', '#80FF00', '#FF007F', '#FFF93C', '#9933FF', '#009999',
                '#C0C0C0', '#CCFF99', '#CCE5FF'
            ],
            title: {
                text: 'Pendidikan'
            },
            xAxis: {
                categories: ['Tidak/Belum Sekolah', 'Belum Tamat SD/Sederajat', 'Tamat SD/Sederajat',
                    'SLTP/Sederajat', 'SLTA/Sederajat', 'Diploma I/II', 'Akademi/Diploma III/Sarjana Muda',
                    'Diploma IV/Strata I', 'Strata II', 'Strata III'
                ]
            },
            yAxis: {
                title: {
                    enabled: false
                },
            },
            tooltip: {
                headerFormat: '<b>{point.key}</b><br>',
                pointFormat: '{point.y} Orang</b>'
            },
            plotOptions: {
                line: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Warga',
                colorByPoint: true,
                data: [{
                    name: 'Tidak/Belum Sekolah',
                    y: {{ $tidak_belum_sekolah }},
                }, {
                    name: 'Belum Tamat SD/Sederajat',
                    y: {{ $belum_tamat_sd_sederajat }},
                }, {
                    name: 'Tamat SD/Sederajat',
                    y: {{ $tamat_sd_sederajat }},
                }, {
                    name: 'SLTP/Sederajat',
                    y: {{ $sltp_sederajat }},
                }, {
                    name: 'SLTA/Sederajat',
                    y: {{ $slta_sederajat }},
                }, {
                    name: 'Diploma I/II',
                    y: {{ $diploma_i_ii }},
                }, {
                    name: 'Akademi/Diploma III/Sarjana Muda',
                    y: {{ $akademi_diploma_iii_sarjana_muda }},
                }, {
                    name: 'Diploma IV/Strata I',
                    y: {{ $diploma_iv_strata_i }},
                }, {
                    name: 'Strata II',
                    y: {{ $strata_ii }},
                }, {
                    name: 'Strata III',
                    y: {{ $strata_iii }},
                }]
            }]
        });
    </script>

    <script>
        Highcharts.chart('hub', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'column'
            },
            colors: ['#CC0000', '#0000FF', '#FFC0CB', '#80FF00', '#FF007F', '#FFF93C', '#9933FF', '#009999',
                '#C0C0C0', '#CCFF99', '#CCE5FF'
            ],
            title: {
                text: 'Status Hubungan Dalam Keluarga'
            },
            xAxis: {
                categories: ['Kepala Keluarga', 'Suami', 'Istri', 'Anak', 'Menantu', 'Cucu',
                    'Orang Tua', 'Mertua', 'Famili Lain', 'Pembantu', 'Lainnya'
                ]
            },
            yAxis: {
                title: {
                    enabled: false
                },
            },
            tooltip: {
                headerFormat: '<b>{point.key}</b><br>',
                pointFormat: '{point.y} Orang</b>'
            },
            plotOptions: {
                column: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Warga',
                colorByPoint: true,
                data: [{
                    name: 'Kepala Keluarga',
                    y: {{ $kepala_keluarga }},
                }, {
                    name: 'Suami',
                    y: {{ $suami }},
                }, {
                    name: 'Istri',
                    y: {{ $istri }},
                }, {
                    name: 'Anak',
                    y: {{ $anak }},
                }, {
                    name: 'Menantu',
                    y: {{ $menantu }},
                }, {
                    name: 'Cucu',
                    y: {{ $cucu }},
                }, {
                    name: 'Orang Tua',
                    y: {{ $orang_tua }},
                }, {
                    name: 'Mertua',
                    y: {{ $mertua }},
                }, {
                    name: 'Famili Lain',
                    y: {{ $famili_lain }},
                }, {
                    name: 'Pembantu',
                    y: {{ $pembantu }},
                }, {
                    name: 'Lainnya',
                    y: {{ $lainnya }},
                }, ]
            }]
        });
    </script>
@endsection
