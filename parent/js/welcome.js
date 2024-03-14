<script>
		function addValue(checkboxElement, level) {
			var value = checkboxElement.value;

			if (!value) {
				return;
			}

			var splitValue = value.split(',');
			var price = parseInt(splitValue[1]);

			if (isNaN(price)) {
				price = 0;
			}

			var totalElement = document.getElementById('total');
			var currentTotal = parseInt(totalElement.innerHTML);

			if (checkboxElement.checked) {
				currentTotal += price;
			} else {
				currentTotal -= price;
			}

			totalElement.innerHTML = currentTotal;
		}
	</script>


	<!-- Daily Set -->
	<script>
		document.getElementById('checkboxall').addEventListener('change', function() {
			for (let i = 1; i <= 50; i++) {
				document.getElementById('checkbox' + i).checked = this.checked;
			}
			document.getElementById('checkboxw1').checked = this.checked;
			document.getElementById('checkboxw2').checked = this.checked;
		});

		for (let i = 1; i <= 50; i++) {
			document.getElementById('checkbox' + i).addEventListener('change', function() {
				document.getElementById('checkboxall').checked = Array.from({
					length: 50
				}, (_, j) => j + 1).every(j => document.getElementById('checkbox' + j).checked);
			});
		}

		document.getElementById('checkboxw1').addEventListener('change', function() {
			document.getElementById('checkboxall').checked = document.getElementById('checkboxw1').checked && document.getElementById('checkboxw2').checked;
		});

		document.getElementById('checkboxw2').addEventListener('change', function() {
			document.getElementById('checkboxall').checked = document.getElementById('checkboxw1').checked && document.getElementById('checkboxw2').checked;
		});

		// Daily Set Week 1
		document.getElementById('checkboxw1').addEventListener('change', function() {
			for (let i = 1; i <= 25; i++) {
				document.getElementById('checkbox' + i).checked = this.checked;
			}
		});

		for (let i = 1; i <= 25; i++) {
			document.getElementById('checkbox' + i).addEventListener('change', function() {
				document.getElementById('checkboxw1').checked = Array.from({
					length: 5
				}, (_, j) => j + 1).every(j => document.getElementById('checkbox' + j).checked);
			});
		}

		//Daily Set Week 2
		document.getElementById('checkboxw2').addEventListener('change', function() {
			for (let i = 26; i <= 50; i++) {
				document.getElementById('checkbox' + i).checked = this.checked;
			}
		});

		for (let i = 26; i <= 50; i++) {
			document.getElementById('checkbox' + i).addEventListener('change', function() {
				document.getElementById('checkboxw2').checked = Array.from({
					length: 5
				}, (_, j) => j + 26).every(j => document.getElementById('checkbox' + j).checked);
			});
		}
	</script>


	<!-- Pasta -->
	<script>
		document.getElementById('checkboxall_pasta').addEventListener('change', function() {
			for (let i = 51; i <= 60; i++) {
				document.getElementById('checkbox' + i).checked = this.checked;
			}
			document.getElementById('checkboxw1_pasta').checked = this.checked;
			document.getElementById('checkboxw2_pasta').checked = this.checked;
		});

		for (let i = 51; i <= 60; i++) {
			document.getElementById('checkbox' + i).addEventListener('change', function() {
				document.getElementById('checkboxall_pasta').checked = Array.from({
					length: 10
				}, (_, j) => j + 51).every(j => document.getElementById('checkbox' + j).checked);
			});
		}

		document.getElementById('checkboxw1_pasta').addEventListener('change', function() {
			document.getElementById('checkboxall_pasta').checked = document.getElementById('checkboxw1_pasta').checked && document.getElementById('checkboxw2_pasta').checked;
		});

		document.getElementById('checkboxw2_pasta').addEventListener('change', function() {
			document.getElementById('checkboxall_pasta').checked = document.getElementById('checkboxw1_pasta').checked && document.getElementById('checkboxw2_pasta').checked;
		});

		// Pasta Week 1
		document.getElementById('checkboxw1_pasta').addEventListener('change', function() {
			for (let i = 51; i <= 55; i++) {
				document.getElementById('checkbox' + i).checked = this.checked;
			}
		});

		for (let i = 51; i <= 55; i++) {
			document.getElementById('checkbox' + i).addEventListener('change', function() {
				document.getElementById('checkboxw1_pasta').checked = Array.from({
					length: 5
				}, (_, j) => j + 51).every(j => document.getElementById('checkbox' + j).checked);
			});
		}

		//Pasta Week 2
		document.getElementById('checkboxw2_pasta').addEventListener('change', function() {
			for (let i = 56; i <= 60; i++) {
				document.getElementById('checkbox' + i).checked = this.checked;
			}
		});

		for (let i = 56; i <= 60; i++) {
			document.getElementById('checkbox' + i).addEventListener('change', function() {
				document.getElementById('checkboxw2_pasta').checked = Array.from({
					length: 5
				}, (_, j) => j + 56).every(j => document.getElementById('checkbox' + j).checked);
			});
		}
	</script>


	<!-- Breakfast & Stall -->
	<script>
		document.getElementById('checkboxall_breakfast').addEventListener('change', function() {
			for (let i = 61; i <= 70; i++) {
				document.getElementById('checkbox' + i).checked = this.checked;
			}
			document.getElementById('checkboxw1_breakfast').checked = this.checked;
			document.getElementById('checkboxw2_breakfast').checked = this.checked;
		});

		for (let i = 61; i <= 70; i++) {
			document.getElementById('checkbox' + i).addEventListener('change', function() {
				document.getElementById('checkboxall_breakfast').checked = Array.from({
					length: 10
				}, (_, j) => j + 61).every(j => document.getElementById('checkbox' + j).checked);
			});
		}

		document.getElementById('checkboxw1_breakfast').addEventListener('change', function() {
			document.getElementById('checkboxall_breakfast').checked = document.getElementById('checkboxw1_breakfast').checked && document.getElementById('checkboxw2_breakfast').checked;
		});

		document.getElementById('checkboxw2_breakfast').addEventListener('change', function() {
			document.getElementById('checkboxall_breakfast').checked = document.getElementById('checkboxw1_breakfast').checked && document.getElementById('checkboxw2_breakfast').checked;
		});

		// Breakfast Week 1
		document.getElementById('checkboxw1_breakfast').addEventListener('change', function() {
			for (let i = 61; i <= 65; i++) {
				document.getElementById('checkbox' + i).checked = this.checked;
			}
		});

		for (let i = 61; i <= 65; i++) {
			document.getElementById('checkbox' + i).addEventListener('change', function() {
				document.getElementById('checkboxw1_breakfast').checked = Array.from({
					length: 5
				}, (_, j) => j + 61).every(j => document.getElementById('checkbox' + j).checked);
			});
		}

		//Breakfast Week 2
		document.getElementById('checkboxw2_breakfast').addEventListener('change', function() {
			for (let i = 66; i <= 70; i++) {
				document.getElementById('checkbox' + i).checked = this.checked;
			}
		});

		for (let i = 66; i <= 70; i++) {
			document.getElementById('checkbox' + i).addEventListener('change', function() {
				document.getElementById('checkboxw2_breakfast').checked = Array.from({
					length: 5
				}, (_, j) => j + 66).every(j => document.getElementById('checkbox' + j).checked);
			});
		}
	</script>



	<!--<script>
		document.getElementById('checkboxall').addEventListener('change', function() {
			for (let i = 1; i <= 50; i++) {
				document.getElementById('checkbox' + i).checked = this.checked;
			}
		});
		for (let i = 1; i <= 50; i++) {
			document.getElementById('checkbox' + i).addEventListener('change', function() {
				let allChecked = true;
				for (let j = 1; j <= 50; j++) {
					if (!document.getElementById('checkbox' + j).checked) {
						allChecked = false;
						break;
					}
				}
				document.getElementById('checkboxall').checked = allChecked;
			});
		}


		document.getElementById('checkboxw1').addEventListener('change', function() {
			for (let i = 1; i <= 25; i++) {
				document.getElementById('checkbox' + i).checked = this.checked;
			}
		});
		for (let i = 1; i <= 25; i++) {
			document.getElementById('checkbox' + i).addEventListener('change', function() {
				let allChecked = true;
				for (let j = 1; j <= 25; j++) {
					if (!document.getElementById('checkbox' + j).checked) {
						allChecked = false;
						break;
					}
				}
				document.getElementById('checkboxw1').checked = allChecked;
			});
		}


		document.getElementById('checkboxw2').addEventListener('change', function() {
			for (let i = 26; i <= 50; i++) {
				document.getElementById('checkbox' + i).checked = this.checked;
			}
		});
		for (let i = 26; i <= 50; i++) {
			document.getElementById('checkbox' + i).addEventListener('change', function() {
				let allChecked = true;
				for (let j = 26; j <= 50; j++) {
					if (!document.getElementById('checkbox' + j).checked) {
						allChecked = false;
						break;
					}
				}
				document.getElementById('checkboxw2').checked = allChecked;
			});
		}


		document.getElementById('checkboxall_pasta').addEventListener('change', function() {
			for (let i = 51; i <= 60; i++) {
				document.getElementById('checkbox' + i).checked = this.checked;
			}
		});
		for (let i = 51; i <= 60; i++) {
			document.getElementById('checkbox' + i).addEventListener('change', function() {
				let allChecked = true;
				for (let j = 1; j <= 50; j++) {
					if (!document.getElementById('checkbox' + j).checked) {
						allChecked = false;
						break;
					}
				}
				document.getElementById('checkboxall_pasta').checked = allChecked;
			});
		}

		document.getElementById('checkboxw1_pasta').addEventListener('change', function() {
			for (let i = 51; i <= 55; i++) {
				document.getElementById('checkbox' + i).checked = this.checked;
			}
		});
		for (let i = 51; i <= 55; i++) {
			document.getElementById('checkbox' + i).addEventListener('change', function() {
				let allChecked = true;
				for (let j = 51; j <= 55; j++) {
					if (!document.getElementById('checkbox' + j).checked) {
						allChecked = false;
						break;
					}
				}
				document.getElementById('checkboxw1_pasta').checked = allChecked;
			});
		}

		document.getElementById('checkboxw2_pasta').addEventListener('change', function() {
			for (let i = 56; i <= 60; i++) {
				document.getElementById('checkbox' + i).checked = this.checked;
			}
		});
		for (let i = 56; i <= 60; i++) {
			document.getElementById('checkbox' + i).addEventListener('change', function() {
				let allChecked = true;
				for (let j = 56; j <= 60; j++) {
					if (!document.getElementById('checkbox' + j).checked) {
						allChecked = false;
						break;
					}
				}
				document.getElementById('checkboxw2_pasta').checked = allChecked;
			});
		}
	</script>-->
