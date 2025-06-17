<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'title' => '🌾 The Future of Urban Agriculture: How Vertical Farming is Changing the Way We Grow Food 🌾',
            'slug' => 'the-future-of-urban-agriculture-how-vertical-farming-is-changing-the-way-we-grow-food',
            'description' => 'In recent years, urban agriculture has emerged as one of the most promising solutions to food security, sustainability, and space limitations in modern cities. At the forefront of this movement is vertical farming—a method of growing crops in vertically stacked layers, often integrated into buildings, shipping containers, or specially designed indoor facilities.Vertical farming offers a revolutionary approach to agriculture by allowing food production in areas where traditional farming is impossible or inefficient. It leverages hydroponics, aeroponics, and aquaponics—techniques that use water-based nutrient systems instead of soil. With these methods, plants grow faster, use up to 90% less water, and eliminate the need for harmful pesticides or herbicides.One of the key advantages of vertical farming is its ability to operate year-round, unaffected by seasonal weather patterns or climate changes. Since these systems are usually controlled environments, growers can regulate temperature, humidity, and light to optimize yields. This means lettuce, herbs, strawberries, or even mushrooms can be harvested multiple times a year with minimal environmental footprint.Another benefit lies in proximity. Urban vertical farms can be built inside cities, on rooftops, or even underground—reducing the distance between farm and table. This eliminates much of the transportation cost and carbon emissions typically associated with food distribution. In places like Singapore, New York, and Tokyo, vertical farms are already supplying fresh produce directly to restaurants, grocery stores, and residents.',
            'image' => '1750079435.webp',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'title' => 'Exploring the Green Heritage of Bursa',
            'slug' => 'exploring-the-green-heritage-of-bursa',
            'description' => 'Bursa, often called "Green Bursa," is a city that beautifully blends natural beauty with deep historical roots. Known for its lush parks, thermal baths, and the iconic Uludağ mountain, Bursa offers a refreshing escape into nature while showcasing Ottoman architecture and cultural heritage. Whether you’re tasting its legendary İskender kebab or visiting the historic Grand Mosque (Ulu Cami), Bursa always has something meaningful to offer.',
            'image' => '1750080808.webp',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'title' => 'Coastal Calm in Arsuz',
            'slug' => 'coastal-calm-in-arsuz',
            'description' => 'Arsuz, located along Turkey’s eastern Mediterranean coast, is a peaceful town ideal for quiet retreats. With its calm beaches, warm climate, and small seafood restaurants by the sea, Arsuz is the perfect place for anyone seeking a slower, more natural pace of life. The region’s historical churches and scenic coastal roads add an extra layer of charm to this underrated coastal gem.',
            'image' => '1750080863.webp',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'title' => 'The Rise of Edge Computing: Shaping the Future of Data Processing',
            'slug' => 'the-rise-of-edge-computing-shaping-the-future-of-data-processing',
            'description' => 'In recent years, edge computing has emerged as a transformative force in the technology landscape. Unlike traditional cloud computing where data is processed in centralized data centers, edge computing processes data closer to the source — at the "edge" of the network. This shift is driven by the growing demand for real-time data processing in areas like autonomous vehicles, smart manufacturing, and IoT devices.With edge computing, latency is reduced significantly. For example, in autonomous driving, decisions must be made in milliseconds — which centralized servers simply cannot guarantee. Similarly, in healthcare, edge computing allows real-time monitoring of patient vitals through smart devices, enabling immediate interventions.Another major advantage of edge computing is bandwidth efficiency. Instead of sending all data to the cloud, only essential information is transferred, reducing network congestion and costs.Security is also enhanced. Since data is processed locally, the risk of exposure during transmission is lowered. Companies can better comply with data privacy laws by keeping sensitive data onsite.As 5G networks expand, edge computing will become even more powerful, enabling ultra-low-latency applications such as augmented reality (AR), real-time gaming, and remote surgeries. Tech giants like Amazon, Microsoft, and Google are already investing in edge infrastructures, and startups are rapidly innovating in this space.In conclusion, edge computing isn’t just a trend — it’s a paradigm shift. It redefines how we collect, process, and use data, making technology more responsive, efficient, and intelligent.',
            'image' => '1750080920.webp',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
