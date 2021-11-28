<div class="movie-item-page">
	<div class="movie-item-page--header">

		<div class="movie--page-header--title">
			<?= $movie['TITLE'] ?>
			<div class="movie--page-header--subtitle">
				<?= $movie['ORIGINAL_TITLE'] ?>
				<div class="movie-header--age-rating">
					<div class="agerate-rectangle">
						<div class="movies-ageRate">
							<?= $movie['AGE_RESTRICTION'] . "+" ?>
						</div>
					</div>
				</div>

			</div>

		</div>
		<div style="flex:1"></div>
		<div class="movie-like-button"></div>


	</div>
	<div class="movie-page--container">
		<div class="movie-page--image--container">
			<div class="movie-page--image" style="background-image: url(./resource/image/<?= $movie['ID'] ?>.jpg)">

			</div>

		</div>
		<div class="movie-page--info">
			<div class="movie-page--rating">
				<?php
				$rate = floor($movie['RATING']) ?>
				<?
				for ($i = 0; $i < $rate; $i++): ?>
					<div class="rate-rectangle--orange">
					</div>
				<?php
				endfor; ?>
				<?
				for ($i = 0; $i < 10 - $rate; $i++): ?>
					<div class="rate-rectangle-grey"></div>
				<?php
				endfor; ?>
				<div class="rate-page--num">
					<div class="page-rating">

						<?=convertRating($movie['RATING']); ?>

					</div>
				</div>

			</div>
			<div class="movie-page--inform">
				<div class="page--about-movie">О фильме</div>
				<div class="movie-info--release-date">
					<div class="release-date"> Год производства:</div>
					<div class="date"><?= $movie['RELEASE_DATE'] ?></div>
				</div>
				<div class="movie-info-director">
					<div class="director-title">Режисер</div>
					<div class="director-name"><?= $movie['DIRECTOR'] ?></div>
				</div>
				<div class="page--actor-inform">
					<div class="actor-list--title">В главных ролях:</div>
					<div class="actor-list"><?= formatMovieActors($movie['CAST']) ?></div>
				</div>
			</div>
			<div class="page--description">Описание</div>
			<div class="page--movie-description">
<?=$movie['DESCRIPTION']?>
			</div>
		</div>

	</div>
