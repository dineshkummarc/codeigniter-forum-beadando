# codeigniter-forum-beadando

<ul>
		<ul>
			<li>A codeigniter-forum.sql -be raktam minta rekordokat amivel fel lehet tölteni az adatbázist</li>
			<li>ELKEZDVE: ADMIN oldalról adatok letöltése CSV formátumban</li>
		</ul>
	<li>
		<ul>
			<li>Posts - index (Latest Posts) - Pagination </li>
			<li>Posts - posts/topic/$index - Pagination </li>
			<li>Admin - minden csak admin engedéllyel
				<ul>
					<li>adatok megjelenítése</li>
				</ul>
			</li>
		</ul>
	</li>
	<li>
		<ul>
			<li>Category
				<ul>
					<li>create: csak admin</li>
					<li>create subcategory : csak belépve</li>
					<li>delete: csak admin</li>
					<li>edit: csak admin</li>
					<li>update: csak admin</li>
				</ul>
			</li>
			<li>Subcategory
				<ul>
					<li>delete: csak user vagy admin</li>
					<li>create: csak bejelentkezve</li>
					<li>edit: csak user vagy admin</li>
				</ul>
			</li>
			<li>Posts
				<ul>
					<li>create: csak belépve</li>
					<li>edit: csak tulaj vagy admin VIEW NEM JÓ</li>
					<li>update: csak tulaj vagy admin</li>
					<li>delete : csak tulaj vagy admin</li>
				</ul>
			</li>
			<li>codeigniter-forum-beadando/categories: csak akkor jelenik meg a Create Category link, ha adminként vagyunk bejelentkezve </li>
			<li>codeigniter-forum-beadando/categories/$id: csak akkor jelenik meg az edit és a delete, ha adminként vagyunk bejelentkezve  </li>
		</ul>
	</li>
	<li>Input mezők validálása</li>
	<li>Felhasználók
		<ul>
			<li>saját validációs szabály regisztrációnál</li>
			<li>bejelentkezés</li>
			<li>regisztráció</li>
			<li>kiejelentkezés</li>
		</ul>
	</li>
	<li>Kategóriákat
		<ul>
			<li>létrehozásnál fényképet lehet feltölteni, amit validálunk</li>
			<li>létrehozni</li>
			<li>megjeleníteni</li>
			<li>módosítani</li>
			<li>törölni</li>
		</ul>
	</li>
	<li>
		Alkategóriákat (Topicocat/subcategories)
		<ul>
			<li>létrehozni</li>
			<li>megjeleníteni</li>
			<li>módosítani</li>
			<li>törölni</li>
		</ul>
	</li>
	<li>
		Posztokat
		<ul>
			<li>létrehozni - csak akkor ha be van jelentkezve</li>
			<li>megjeleníteni</li>
			<li>törölni</li>
		</ul>
	</li>
	
</ul>
