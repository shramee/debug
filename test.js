				var $t = $( this ),
				    $prev = $t.prev(),
				    widthTaken = 0,
				    widthNow = ui.size.width,
				    originalWidth = ui.originalSize.width;

				$t.parent().addClass( 'ppb-cols-resizing' );

				$prev.siblings('.panel-grid-cell' ).each( function() {
					var $t = $( this );
					widthTaken += 1 + $t.outerWidth() + parseInt( $t.css('margin-left') ) + parseInt( $t.css('margin-right') );
				} );

				widthTaken += parseInt( $prev.css('padding-left') ) + parseInt( $prev.css('margin-left') ) +
				              parseInt( $prev.css('padding-right') ) + parseInt( $prev.css('margin-right') );

				$prev.css(
					'width',
					( $t.parent().width() - widthTaken - 1 )
				);

				prevu.resizableCells.correctCellData( $t  );
				prevu.resizableCells.correctCellData( $prev  );

				console.log(
					'Parent Width: ' + $t.parent().width() + ';\n Width Taken: ' + ( $prev.width() + widthTaken ) );

				prevu.unSavedChanges = true;

				if ( originalWidth < widthNow ) {
					//Increasing width
					if ( $t.parent().width() * 0.93 < widthTaken ) {
						$t.resizable( 'widget' ).trigger( 'mouseup' );
					}
				} else {
					//Decreasing width
					if ( $t.parent().width() * 0.07 > $t.width() ) {
						$t.resizable( 'widget' ).trigger( 'mouseup' );
					}
				}
