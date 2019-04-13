# seniorsoftwareengineertest
Converting IDR TO USD using API


Copykan project ini pada htdocs, lalu akses dengan alamat localhost/somatech

Note*
1.Soal nomor 2 tidak berhasil karena masih menggunakan akun free, dari yang saya baca fitur conversi harus dengan akun berbayar.
2.Terdapat screenshoot di folder assets



Masuk ke dashboard jenkins (biasanya klw baru, harus update password terlebih dahulu)
Pilih add credentials untuk membuat job, contohnya job freestyle (freestyle project). Masukan namanya misalnya ,test ,isi url repo dll.
Klw berhasil berarti udah integrated ,asumsinya docker udah di instal.
Tambahkan perintah 
usermod -aG docker jenkins
/etc/init.da/jenkins restart
su jenkins
docker login
#masukkan username dan password

New task, build triggers, execute shell
docker build. -t developerpdak/nginx:latest
docker push developerpdak/nginx:latest
Build now pada jenkins -> console akan terlihat

Kubernetes, dan docker (master & worker) untuk mengambil docker registry 
Build Image Docker dari WAR
git clone https://github.com/blackbeltandre/seniorsoftwareengineertest.git
cd dockerwar
docker-compose build .
docker-compose up -d
docker login
docker image
docker tag nginx developerpdak/nginx
docker push developerpdak/nginx
