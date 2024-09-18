<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = collect([
            [//1
                'name' => 'Lencería para adultos, vestido',
                'price' => 16.25,
                'description' => 'Lencería sexy para adultos, vestido de noche',
                'brand_id' => NULL,
                'categories' => [1],
            ],
            [//2
                'name' => 'Ropa interior con lazo',
                'price' => 18,
                'description' => "Descubre una pieza única de lencería diseñada para realzar tu sensualidad. Nuestra ropa interior con lazo combina delicadeza y estilo con un toque seductor. Confeccionada con materiales suaves y de alta calidad, esta prenda se adapta perfectamente a tu cuerpo, proporcionando comodidad y confianza. El detalle del lazo agrega un aire coqueto y elegante, ideal para momentos especiales o para sentirte increíble en cualquier ocasión. Atrévete a lucir espectacular con nuestra exclusiva ropa interior con lazo, perfecta para cualquier momento en el que desees destacar tu lado más sexy.",
                'brand_id' =>NULL,
                'categories' => [1],
            ],
            [//3
                'name' => 'Ropa interior / Conjunto de lencería',
                'price' => 16,
                'description' => 'Este exquisito conjunto de lencería, compuesto por un brassier y panties, ha sido diseñado para ofrecerte el balance perfecto entre sensualidad y confort. Fabricado con materiales suaves y transpirables, se ajusta delicadamente a tu figura, brindando una sensación de comodidad inigualable durante todo el día. Ideal para esos momentos especiales o para sentirte increíble en cualquier ocasión, este conjunto combina elegancia y estilo con un toque de sofisticación. ¡Haz de cada día una oportunidad para lucir lo mejor de ti con este espectacular conjunto de lencería!',
                'brand_id' => NULL,
                'categories' => [1],
            ],
            [//4
                'name' => 'Lenceria de dos piezas',
                'price' => 10,
                'description' => 'Este conjunto de lencería de dos piezas está diseñado para realzar tu feminidad con un toque de sofisticación. Su delicado diseño y los materiales suaves te garantizan una experiencia cómoda y atractiva. Ideal para ocasiones especiales o para sentirte segura y elegante en cualquier momento, este conjunto de lencería combina sensualidad con un estilo moderno que hará que te sientas increíble. ¡Haz que cada momento sea especial con esta lencería de dos piezas!',
                'brand_id' => NULL,
                'categories' => [1],
            ],
            [//5
                'name' => 'Body con Orejas de Conejo',
                'price' => 20,
                'description' => 'Este encantador body con orejas de conejo combina sensualidad y diversión en una sola pieza. Perfecto para añadir un toque coqueto a tus momentos íntimos, este body ajustado realza tu figura, mientras que las orejas de conejo le dan un aire juguetón y atrevido. Confeccionado con materiales suaves y cómodos, es ideal para sorprender y seducir en cualquier ocasión especial. ¡Atrévete a romper la rutina y añade un toque lúdico a tu guardarropa!',
                'brand_id' => NULL,
                'categories' => [1],
            ],
            [//6
                'name' => 'Lencería de encaje transparente',
                'price' => 10,
                'description' => 'Descubre la perfecta fusión de elegancia y sensualidad con esta lencería de encaje transparente. Su delicado diseño revela lo justo, insinuando sin mostrar del todo, para un look que evoca misterio y atracción. Ideal para momentos especiales o para sentirte poderosa y segura, esta pieza está confeccionada con encaje suave que acaricia la piel con comodidad. Como dijo Marilyn Monroe: "La imperfección es belleza, la locura es genio, y es mejor ser absolutamente ridículo que absolutamente aburrido". ¡Siente esa belleza única en cada momento!',
                'brand_id' => NULL,
                'categories' => [1],
            ],
            [//7
                'name' => 'Conjunto de Lencería Erótica de 2 piezas',
                'price' => 8,
                'description' => 'Este conjunto de lencería erótica de 2 piezas es la combinación perfecta entre seducción y estilo. Compuesto por un brassier y panties de diseño provocativo, está elaborado con materiales delicados que se ajustan perfectamente al cuerpo, destacando cada curva de manera sensual. Ideal para ocasiones íntimas, este conjunto te hará sentir irresistible y segura. Añade un toque de emoción a tus momentos especiales con esta pieza pensada para elevar tu confianza y sensualidad.',
                'brand_id' => NULL,
                'categories' => [1],
            ],
            [//8
                'name' => 'Lencería Sexy de encaje con escote',
                'price' => 10,
                'description' => 'Descubre la lencería perfecta para esos momentos especiales. Esta pieza de encaje con un provocativo escote combina la elegancia y sensualidad en un diseño atrevido y delicado. El encaje suave realza la figura y el escote profundo añade un toque seductor que no pasará desapercibido. Perfecta para sorprender o para sentirte irresistible, esta lencería es ideal para ocasiones íntimas o para cualquier momento en el que quieras lucir espectacular.',
                'brand_id' => NULL,
                'categories' => [1],
            ],
            [//9
                'name' => 'Lencería de mujer corsé encaje sin alambre Racy muselina',
                'price' => 10,
                'description' => 'Este elegante corsé de encaje sin alambre es una pieza imprescindible para quienes buscan la combinación perfecta entre sensualidad y confort. El diseño en muselina ligera se adapta suavemente al cuerpo, brindando un ajuste cómodo sin sacrificar estilo. Su encaje delicado añade un toque romántico y audaz, ideal para realzar tu figura en cualquier ocasión especial. Perfecto para quienes desean sentirse seguras y seductoras a la vez.',
                'brand_id' => NULL,
                'categories' => [1],
            ],
            [//10
                'name' => 'Conjunto de lencería, ropa interior femenina, Falda plisada a cuadros, uniforme de oso.',
                'price' => 20,
                'description' => 'Este encantador conjunto de lencería combina una falda plisada a cuadros con un coqueto uniforme de oso, creando un look juguetón y seductor. Diseñado para resaltar tu figura, este set es perfecto para ocasiones íntimas o para sorprender con un toque divertido. La mezcla de encaje delicado y detalles de estilo uniforme lo convierte en una opción única y atrevida. Ideal para quienes buscan combinar sensualidad con un toque juvenil y desenfadado.',
                'brand_id' => NULL,
                'categories' => [1],
            ],
            [//11
                'name' => 'Capucha de látex de goma SM Fetiche Bondage',
                'price' => 50,
                'description' => 'Explora el lado más oscuro y excitante de tus fantasías con esta capucha de látex de goma para prácticas SM y Bondage. Diseñada para ajustarse cómodamente a la cabeza, esta capucha ofrece una sensación de sumisión y control absoluto, perfecta para quienes disfrutan del fetiche y los juegos de poder. Suave, resistente y flexible, es ideal para llevar las experiencias BDSM al siguiente nivel, proporcionando tanto anonimato como restricción. Eleva tu juego de roles con esta pieza esencial para los amantes del fetiche.',
                'brand_id' => NULL,
                'categories' => [1],
            ],
            [//12
                'name' => 'Plug Anal Cola de Conejo de colores',
                'price' => 10,
                'description' => 'Añade un toque juguetón y sensual a tus experiencias íntimas con este plug anal de suave silicona, adornado con una coqueta cola de conejo de colores. Perfecto para quienes desean explorar nuevas sensaciones mientras incorporan un elemento divertido y visualmente atractivo. La cola esponjosa y vibrante realza los juegos de roles y el placer visual, convirtiendo cualquier momento en una fantasía llena de color y erotismo. Ideal tanto para principiantes como para usuarios experimentados, este plug anal es fácil de usar y proporciona una combinación de comodidad y estilo.',
                'brand_id' => NULL,
                'categories' => [2],
            ],
            [//13
                'name' => 'Vibrador y succionador de clítoris',
                'price' => 20,
                'description' => 'Descubre el placer máximo con este innovador vibrador y succionador de clítoris, diseñado para ofrecer una experiencia única e intensa. Con potentes modos de vibración y succión, este dispositivo estimula de manera precisa el clítoris, proporcionando oleadas de placer irresistibles. Su diseño ergonómico y materiales suaves al tacto lo hacen fácil de usar y perfecto para el disfrute en solitario o en pareja. Ajustable a varios niveles de intensidad, permite personalizar cada sesión según tus deseos. Vive orgasmos más profundos y satisfactorios con este compañero íntimo ideal para quienes buscan algo más que un juguete tradicional.',
                'brand_id' => NULL,
                'categories' => [3, 4],
            ],
            [//14
                'name' => 'Vibrador Rabbit',
                'price' => 20,
                'description' => 'El Vibrador Rabbit es el aliado perfecto para quienes buscan una experiencia intensa de doble estimulación. Con un diseño icónico de doble motor, este vibrador no solo estimula el punto G, sino también el clítoris gracias a sus "orejas" flexibles que vibran al ritmo de tus deseos. Sus múltiples velocidades y patrones de vibración permiten ajustar cada sesión a tus preferencias. Hecho de silicona suave y segura para el cuerpo, el Vibrador Rabbit se adapta perfectamente a tu anatomía para brindarte momentos de puro placer. Ideal para quienes desean llevar sus sensaciones al siguiente nivel.',
                'brand_id' => NULL,
                'categories' => [3],
            ],
            [//15
                'name' => 'Inmovilizador de manos con mordaza',
                'price' => 25,
                'description' => 'Este inmovilizador de manos con mordaza es el complemento ideal para quienes disfrutan de juegos de restricción y bondage. Diseñado para ofrecer un control total, las correas ajustables aseguran las muñecas cómodamente, mientras que la mordaza suavemente acolchada proporciona una experiencia inmersiva sin comprometer la comodidad. Fabricado con materiales duraderos y seguros para la piel, este accesorio es perfecto tanto para principiantes como para expertos en juegos de dominación. Añade un toque de intensidad y control a tus momentos más íntimos.',
                'brand_id' => NULL,
                'categories' => [5, 6],
            ],
            [//16
                'name' => 'Kit BDSM - Bondage, Mordaza con bola con muñequeras',
                'price' => 25,
                'description' => 'Explora el mundo del BDSM con este completo kit de bondage que incluye una mordaza con bola y muñequeras ajustables. Perfecto para quienes desean experimentar juegos de dominación y sumisión, este kit garantiza seguridad y comodidad gracias a su diseño ergonómico y materiales suaves. Las muñequeras ajustables permiten una sujeción firme pero segura, mientras que la mordaza con bola añade un toque extra de restricción para intensificar la experiencia. Ideal tanto para principiantes como para parejas más experimentadas que buscan llevar sus fantasías al siguiente nivel.',
                'brand_id' => NULL,
                'categories' => [5, 6],
            ],
            [//17
                'name' => 'Succionador en Forma de rosa, vibrador',
                'price' => 25,
                'description' => 'Descubre el placer floral con el Succionador en Forma de Rosa, un vibrador elegante y funcional que combina diseño y rendimiento. Con su forma delicada y realista, este juguete ofrece una experiencia de estimulación intensa y precisa. La succión suave y la vibración potente se combinan para proporcionar un placer inolvidable. Su diseño ergonómico asegura un manejo cómodo, y su material de alta calidad garantiza una sensación lujosa en cada uso. Ideal para quienes buscan un accesorio sensual que también sea una obra de arte en la intimidad.',
                'brand_id' => NULL,
                'categories' => [3, 4],
            ],
            [//18
                'name' => 'Dedal - Condón para dedos - Consolador',
                'price' => 20,
                'description' => 'Extensor de rango Mercusys ME10, fácil de instalar para una mejor conectividad.',
                'brand_id' => NULL,
                'categories' => [7],
            ],
            [//19
                'name' => 'Vibradores de punto G, vibradores anales suaves',
                'price' => 20,
                'description' => 'Descubre el placer en su máxima expresión con nuestro Vibrador de Punto G. Diseñado para estimular de manera precisa y efectiva, este vibrador cuenta con una curvatura especial que se adapta a la anatomía femenina para una estimulación directa del punto G. Fabricado en silicona de alta calidad, ofrece una sensación suave y placentera. Con múltiples funciones de vibración, puedes personalizar tu experiencia para alcanzar el clímax de manera intensa y satisfactoria. Ideal para quienes buscan una herramienta de placer sofisticada y efectiva.',
                'brand_id' => NULL,
                'categories' => [3],
            ],
            [//20
                'name' => 'Plug Anal de Metal con cola de zorro',
                'price' => 10,
                'description' => 'Explora nuevas dimensiones de placer con nuestro Plug Anal de Metal con Cola de Zorro. Este elegante juguete combina un diseño sofisticado con un toque de fantasía. Con una base de metal resistente y una cola de zorro suave y realista, este plug ofrece una experiencia de uso cómoda y estimulante. Ideal tanto para principiantes como para expertos, su estructura robusta asegura un ajuste seguro, mientras que la cola añade un elemento juguetón y visualmente atractivo. Perfecto para quienes buscan intensificar su experiencia con un accesorio único y versátil.',
                'brand_id' => NULL,
                'categories' => [2],
            ],   
            [//21
                'name' => 'Vibrador de Panti portátil Vibrante Huevo Invisible Control remoto inalámbrico',
                'price' => 25,
                'description' => 'Disfruta de una estimulación discreta y potente con el Vibrador de Panti Portátil Vibrante Huevo Invisible. Este elegante vibrador en forma de huevo está diseñado para ser discreto y cómodo, ideal para usarlo bajo la ropa sin que nadie lo note. Su diseño compacto y suave permite una inserción fácil y cómoda, mientras que su potente motor ofrece intensas vibraciones para el máximo placer. Con el control remoto inalámbrico, puedes ajustar las vibraciones y cambiar los modos sin esfuerzo, brindándote la libertad de experimentar en cualquier lugar y en cualquier momento. Perfecto para juegos en pareja o para disfrutar de una estimulación individual, este vibrador es una opción versátil y emocionante para quienes buscan combinar discreción y placer.',
                'brand_id' => NULL,
                'categories' => [3],
            ],
            [//22
                'name' => 'Funda Para dedos',
                'price' => 37,
                'description' => 'Explora nuevas formas de placer y estimulación con la Funda para Dedos. Este accesorio innovador está diseñado para encajar fácilmente en tus dedos, proporcionando una sensación adicional durante el juego íntimo. Fabricada con materiales suaves y elásticos, la funda se adapta cómodamente a tus dedos, mejorando la textura y el contacto con las zonas erógenas. Ideal para juegos en solitario o en pareja, esta funda para dedos añade una dimensión extra a tus caricias y caricias. Experimenta nuevas sensaciones y aumenta el placer con este accesorio discreto y eficaz. Perfecta para quienes buscan explorar nuevas formas de estimulación con un toque de confort.',
                'brand_id' => NULL,
                'categories' => [7],
            ],
            [//23
                'name' => 'Plug Anal con Adorno de Rosa',
                'price' => 10,
                'description' => 'Añade un toque de elegancia a tus momentos íntimos con el Plug Anal con Adorno de Rosa. Este juguete está diseñado para ofrecer una experiencia placentera y estética, combinando funcionalidad con un atractivo diseño. El plug cuenta con un adorno en forma de rosa en su base, que no solo añade un detalle visual encantador, sino que también ayuda a mantener el juguete en su lugar durante el uso. Fabricado en materiales de alta calidad, el plug anal es suave al tacto y fácil de insertar, proporcionando una sensación de comodidad y placer. Ideal tanto para principiantes como para usuarios experimentados, es perfecto para explorar nuevas sensaciones y añadir un toque de sofisticación a tus juegos íntimos.',
                'brand_id' => NULL,
                'categories' => [2],
            ],
            [//24
                'name' => 'Anillo Vibrador',
                'price' => 25,
                'description' => 'Descubre nuevas dimensiones del placer con el Anillo Vibrador. Diseñado para intensificar la experiencia sexual, este juguete combina la funcionalidad de un anillo para el pene con la estimulación vibratoria. Su ajuste cómodo y flexible se adapta a diferentes tamaños, mientras que la vibración proporciona una excitación adicional tanto para ti como para tu pareja. Fabricado en silicona de alta calidad, el Anillo Vibrador es suave, duradero y resistente al agua, lo que facilita su uso y limpieza. Ideal para prolongar la erección y aumentar el placer durante el acto sexual, este anillo vibrador es una excelente adición a cualquier colección de juguetes íntimos. Prepárate para disfrutar de momentos más intensos y satisfactorios con este accesorio innovador.',
                'brand_id' => NULL,
                'categories' => [3],
            ],
            [//25
                'name' => 'Bala Vibradora',
                'price' => 20,
                'description' => 'Experimenta una estimulación intensa y precisa con la Bala Vibradora. Compacta y discreta, esta pequeña maravilla está diseñada para ofrecer vibraciones potentes y satisfactorias en cualquier momento. Ideal para explorar tus zonas erógenas o como complemento a tus juegos previos, la Bala Vibradora te permite llevar la experiencia del placer a un nivel superior. Hecha de silicona suave y segura para el cuerpo, esta bala es fácil de usar y limpiar. Su tamaño portátil la hace perfecta para llevar en el bolso o de viaje, garantizando que el placer nunca esté fuera de tu alcance. Con control de velocidad ajustable, puedes personalizar la intensidad de las vibraciones según tus preferencias. Disfruta de la máxima satisfacción en un formato elegante y práctico con la Bala Vibradora.',
                'brand_id' => NULL,
                'categories' => [3],
            ],
            [//26
                'name' => 'Bala Vibradora',
                'price' => 26,
                'description' => 'Experimenta una estimulación intensa y precisa con la Bala Vibradora. Compacta y discreta, esta pequeña maravilla está diseñada para ofrecer vibraciones potentes y satisfactorias en cualquier momento. Ideal para explorar tus zonas erógenas o como complemento a tus juegos previos, la Bala Vibradora te permite llevar la experiencia del placer a un nivel superior. Hecha de silicona suave y segura para el cuerpo, esta bala es fácil de usar y limpiar. Su tamaño portátil la hace perfecta para llevar en el bolso o de viaje, garantizando que el placer nunca esté fuera de tu alcance. Con control de velocidad ajustable, puedes personalizar la intensidad de las vibraciones según tus preferencias. Disfruta de la máxima satisfacción en un formato elegante y práctico con la Bala Vibradora.',
                'brand_id' => NULL,
                'categories' => [3],
            ],
            [//27
                'name' => 'Esposas - BDSM - Bondage',
                'price' => 15,
                'description' => 'Explora el mundo del bondage y el BDSM con estas Esposas de alta calidad, diseñadas para proporcionar seguridad y placer en tus sesiones. Fabricadas con materiales robustos y duraderos, estas esposas ofrecen una sujeción firme pero cómoda, ideal para juegos de restricción. El diseño ajustable permite adaptarlas a diferentes tamaños de muñeca, asegurando un ajuste perfecto y seguro. Equipadas con cierres de liberación rápida, garantizan que la seguridad sea una prioridad durante tus experiencias. Perfectas para quienes buscan intensificar la pasión y la conexión en sus juegos de rol, estas esposas son un accesorio esencial para tus aventuras de bondage. Añade un toque de excitación y control a tus encuentros con estas elegantes y funcionales esposas.',
                'brand_id' => NULL,
                'categories' => [5, 6],
            ],
            [//28
                'name' => 'Kit Fetiche / BDSM / Bondage',
                'price' => 35,
                'description' => 'Adéntrate en el mundo del fetiche y el bondage con nuestro completo Kit Fetiche / BDSM / Bondage. Este kit está diseñado para ofrecer una experiencia completa y versátil para quienes desean explorar la dominación y sumisión con estilo y comodidad. El kit incluye una variedad de accesorios esenciales para tus sesiones de bondage, que pueden incluir: Esposas de muñeca: Ajustables y seguras para una sujeción cómoda y efectiva. Mordaza con bola: Para añadir un toque de control y silencio, intensificando la experiencia de sumisión. Correas o correas de muñeca y tobillo: Flexibles y fuertes, ideales para restringir el movimiento de manera segura y placentera. Cada elemento del kit está fabricado con materiales de alta calidad, garantizando durabilidad y confort. Perfecto para principiantes y experimentados en el BDSM, este kit ofrece todo lo necesario para explorar y disfrutar de la dinámica de poder en tus juegos sexuales. Haz de tus experiencias algo inolvidable con este versátil y elegante kit fetiche, diseñado para maximizar el placer y la seguridad en tus sesiones de bondage.',
                'brand_id' => NULL,
                'categories' => [5, 6],
            ],
            [//29
                'name' => 'Estimulador de Brocha',
                'price' => 25,
                'description' => 'Descubre una nueva dimensión del placer con el Estimulador de Brocha, un juguete diseñado para proporcionar sensaciones intensas y placenteras. Su diseño innovador imita la forma de una brocha, permitiendo una estimulación precisa y efectiva en áreas específicas.',
                'brand_id' => NULL,
                'categories' => [3, 7],
            ],
            [//30
                'name' => 'Dildo / Consolador de Colores',
                'price' => 25,
                "description" => 'Explora nuevas sensaciones con el Dildo / Consolador de Colores, un juguete diseñado para brindar una experiencia vibrante y estimulante. Su diseño colorido no solo es visualmente atractivo, sino que también ofrece una estimulación satisfactoria y versátil.',
                'brand_id' => NULL,
                'categories' => [7],
            ],
        ]);

        for($i = 0; $i < count($products); $i++){
            $j = $i + 1;
            $product = new Product();
            $product->price = $products[$i]['price'];
            $product->name = $products[$i]['name'];
            $product->brand_id = $products[$i]['brand_id'];
            $product->description = $products[$i]['description'];
            $product->slug = Str::slug($products[$i]['name']);
            $product->save();

            $product->images()->attach($j);
            $product->categories()->attach($products[$i]['categories']);
    
            // Actualizar el slug con el ID
            $product->slug = $product->slug . '-' . $product->id;
            $product->save();    
        }
    }
}
