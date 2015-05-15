{extends file="bootstrap-layout.tpl"}
							{block name="workbench"}
								{form name="select"}
									{field field="province"}
										{select}
											{option}Jiangsu{/option}
											{option}Anhui{/option}
										{/select}
									{/field}
									{field field="city"}
										{select}{/select}
									{/field}
									{field field="district"}
										{select}{/select}
									{/field}
								{/form}
							{/block}