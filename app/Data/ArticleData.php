<?php

namespace App\Data;

class ArticleData
{
    public static function getAll(): array
    {
        return [
            'bahaya-seks-pranikah-dan-pornografi' => [
                'slug' => 'bahaya-seks-pranikah-dan-pornografi',
                'category' => 'Kesehatan Reproduksi',
                'title' => 'Bahaya Seks Pranikah & Pornografi bagi Remaja',
                'summary' => 'Membahas bahaya dan dampak buruk seks bebas serta pornografi terhadap masa depan remaja.',
                'content' => 'Materi PIK-R (Pusat Informasi dan Konseling Remaja) adalah program dari BKKBN melalui program GenRe (Generasi Berencana) yang berfokus pada penyiapan kehidupan berkeluarga dan kesehatan reproduksi. Seks bebas dan pornografi memberikan dampak buruk yang masif secara fisik, mental, maupun sosial bagi remaja. Melalui edukasi ini, remaja diajak untuk memahami batasan diri, menjaga kehormatan, serta menghindari perilaku berisiko tinggi.',
                'image' => 'Bahaya Seks Pranikah & Pornografi bagi Remaja.jpeg',
                'author' => 'Oleh: Tim PIK-R',
            ],
            'pencegahan-penyalahgunaan-napza' => [
                'slug' => 'pencegahan-penyalahgunaan-napza',
                'category' => 'Kesehatan Reproduksi',
                'title' => 'Pencegahan Penyalahgunaan NAPZA di Kalangan Remaja',
                'summary' => 'Pentingnya membentengi diri dari bahaya narkotika, psikotropika, dan zat adiktif lainnya.',
                'content' => 'NAPZA (Narkotika, Psikotropika, dan Zat Adiktif lainnya) merupakan ancaman nyata bagi kesehatan fisik dan mental generasi muda. Edukasi pencegahan NAPZA di PIK-R berfokus pada pemahaman jenis-jenis zat berbahaya, dampak kecanduan, serta bagaimana cara menolak ajakan menggunakan narkoba dari lingkungan sekitar dengan tegas (asertif).',
                'image' => 'Pencegahan Penyalahgunaan NAPZA di Kalangan Remaja.jpeg',
                'author' => 'Oleh: Tim PIK-R',
            ],
            'memahami-hiv-aids' => [
                'slug' => 'memahami-hiv-aids',
                'category' => 'Kesehatan Reproduksi',
                'title' => 'Memahami HIV/AIDS: Penularan, Pencegahan, dan Mitos',
                'summary' => 'Informasi akurat seputar cara penularan, pencegahan, serta meluruskan mitos keliru tentang HIV/AIDS.',
                'content' => 'Pemahaman seputar HIV/AIDS sangat penting untuk dikuasai remaja agar tidak salah langkah sekaligus menghapus stigma negatif di masyarakat. Materi ini mencakup bagaimana virus HIV menular, langkah-langkah pencegahannya dalam kehidupan sehari-hari, serta meluruskan berbagai mitos keliru yang sering beredar di kalangan remaja.',
                'image' => 'Memahami HIVAIDS Penularan, Pencegahan, dan Mitos.jpeg',
                'author' => 'Oleh: Tim PIK-R',
            ],
            'pendewasaan-usia-pernikahan' => [
                'slug' => 'pendewasaan-usia-pernikahan',
                'category' => 'Perencanaan Masa Depan',
                'title' => 'Pentingnya Pendewasaan Usia Pernikahan (PUP) & 5 Transisi Kehidupan',
                'summary' => 'Mempersiapkan usia ideal menikah serta memahami 5 transisi kehidupan remaja yang sukses.',
                'content' => 'Perencanaan Masa Depan mencakup PUP (Pendewasaan Usia Pernikahan) yaitu merencanakan usia ideal menikah (minimal 21 tahun untuk perempuan dan 25 tahun untuk laki-laki), serta membekali remaja dengan 5 Transisi Kehidupan Remaja: mempraktikkan hidup sehat, melanjutkan sekolah, mencari pekerjaan, menikah dengan perencanaan, dan menjadi anggota masyarakat yang baik.',
                'image' => 'Pentingnya Pendewasaan Usia Pernikahan (PUP).jpeg',
                'author' => 'Oleh: Tim PIK-R',
            ],
            'membangun-konsep-diri-positif' => [
                'slug' => 'membangun-konsep-diri-positif',
                'category' => 'Character Building',
                'title' => 'Membangun Konsep Diri yang Positif dan Percaya Diri',
                'summary' => 'Tips mengenali potensi, bakat, serta membangun rasa percaya diri yang kuat pada remaja.',
                'content' => 'Pengembangan Diri (Character Building) dimulai dari pemahaman konsep diri yang positif. Remaja diajak untuk mengenali minat, bakat, serta kepribadian diri sendiri sehingga mampu membangun rasa percaya diri yang sehat dan tidak mudah terpengaruh oleh standar negatif dari luar.',
                'image' => 'Membangun Konsep Diri yang Positif dan Percaya Diri.jpeg',
                'author' => 'Oleh: Tim PIK-R',
            ],
            'mengelola-kesehatan-mental' => [
                'slug' => 'mengelola-kesehatan-mental',
                'category' => 'Kesehatan Mental & Life Skills',
                'title' => 'Mengelola Kesehatan Mental dan Keterampilan Hidup Remaja',
                'summary' => 'Belajar mengelola stres, self-love, serta mengasah keterampilan hidup seperti problem solving dan manajemen waktu.',
                'content' => 'Kesehatan mental sama pentingnya dengan kesehatan fisik. Materi ini berfokus pada cara mengelola stres, mempraktikkan self-love, serta melatih keterampilan hidup (life skills) seperti komunikasi asertif, pemecahan masalah (problem solving), pengambilan keputusan, dan manajemen waktu yang baik di era modern.',
                'image' => 'Mengelola Kesehatan Mental dan Keterampilan Hidup Remaja.jpeg',
                'author' => 'Oleh: Tim PIK-R',
            ],
            'pergaulan-sehat-dan-konseling-sebaya' => [
                'slug' => 'pergaulan-sehat-dan-konseling-sebaya',
                'category' => 'Bimbingan & Konseling',
                'title' => 'Pergaulan Sehat dan Dasar Keterampilan Konseling Sebaya',
                'summary' => 'Etika pergaulan remaja sesuai norma sosial-agama serta pelatihan dasar bagi konselor sebaya.',
                'content' => 'Materi penunjang ini membahas etika pergaulan sehat menurut norma agama dan sosial, serta memperkenalkan dasar-dasar keterampilan konseling. Pelatihan ini ditujukan agar para pendidik sebaya dan konselor sebaya dapat membantu teman sebaya yang sedang menghadapi masalah dengan tepat.',
                'image' => 'Pergaulan Sehat dan Dasar Keterampilan Konseling Sebaya.jpeg',
                'author' => 'Oleh: Tim PIK-R',
            ],
        ];
    }

    public static function findBySlug(string $slug): ?array
    {
        $articles = static::getAll();
        return $articles[$slug] ?? null;
    }
}
