function format_tanggal(){
        arrbulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        date = new Date();
        detik = date.getSeconds();
        menit = date.getMinutes();
        jam = date.getHours();
        hari = date.getDay();
        tanggal =  String(date.getDate()).padStart(2, '0');
        bulan = String(date.getMonth() + 1).padStart(2, '0');
        tahun = date.getFullYear();
        return tanggal+"-"+bulan+"-"+tahun+" "+jam+":"+menit;
        // document.write(tanggal+"-"+arrbulan[bulan]+"-"+tahun+"<br/>"+jam+" : "+menit+" : "+detik+"."+millisecond);
    
}