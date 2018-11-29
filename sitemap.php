<?php 
header("Content-type: text/xml");
include 'function/init.php';
//main
$web = getUrl();

//menu - page
$menu = getMenus();

//berita
$berita = getBeritasAll(null);

//galeri
$galeri = getGaleriHeader(null);
//dokumen
$dokument = getDokumens();
//pengumuman
$pengumuman = getPengumumanUpdate();
//link terkait
$link = getLinkTerkait();
//dd($menu);

echo "<?xml version='1.0' encoding='UTF-8'?>";
?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   <url>
      <loc><?= $web ?></loc>
      <lastmod><?= date('m-d-Y') ?></lastmod>
      <changefreq>monthly</changefreq>
      <priority>0.8</priority>
   </url>

<?php foreach($menu as $men) {?>
   <url>
      <loc><?= $web.'/'.$men['url'] ?></loc>
      <changefreq>weekly</changefreq>
      <priority>0.6</priority>
   </url>
   <?php if(isset($men['child'])) {
       foreach($men['child'] as $child){
       ?>
    <url>
      <loc><?= $web.'/'.$child['url'] ?></loc>
      <changefreq>weekly</changefreq>
      <priority>0.6</priority>
   </url>
<?php } } }?>

<?php foreach($berita as $ber) {?>
  <url>
      <loc><?= $web.'/berita.php?q='.$ber['slug'] ?></loc>
      <changefreq>weekly</changefreq>
      <title><?= $ber['judul'] ?></title>
      <content type='html'>
        <?= htmlspecialchars($ber['isi'])?>
      </content>
      <priority>0.6</priority>
   </url>
<?php } ?>

<?php foreach($galeri as $ber) {?>
  <url>
      <loc><?= $web.'/berita.php?q='.$ber['slug'] ?></loc>
      <changefreq>weekly</changefreq>
      <priority>0.6</priority>
   </url>
<?php } ?>
</urlset>
