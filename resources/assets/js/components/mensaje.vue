<template>
	<div class="mensaje">
		<div class="row">
			<div class="col-md-5">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Chat
					</div>
					<div class="panel-body">
						<ul class="chat" id="chatWindow" style="height: 200px; overflow-y:scroll">
							<li v-for="comment in comments" class="left clearfix" style="list-style: none">
								<div class="chat-body clearfix">
									<div class="header">
										<strong>
											{{ mensaje.user }}
										</strong>:{{ mensaje.mensaje }}
									</div>
								</div>
							</li>
						</ul>
					</div>

					<form method="post" v-on:submit.prevent="submit" :action="add_comment_url">
						<div class="panel-footer">
							<div class="input-group">
								<input 
									v-model="mensaje"
									name="mensaje"
									type="text"
									class="form-control input-sm"
									placeholder="Escribe un mensaje..."/>

								<span class="input-group-btn">
									<button type="submit" class="btn btn-warning btn-sm">Enviar </button>
								</span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import Vue from 'vue';
export default{
		props:['add_comment_url','get_comment_url','post_id'],
		method_{
			submit(){
				Vue.$http.post(this.add_comment_url,{'comment':this.add_comment_url}).then((response)=>{
					this.comment="";
				})
			}
		},
		data(){
			return{
				comments:[],
				comment:''
			}
		},
		update(){
			var el = document.getElementById('chatWindow');
			el.scrollTop=el.scrollHeight;
		},
		mounted(){
			Vue.$http.get(this.get_comment_url).then((response)=>{
				.forEach(response.data, (comment)=>{this.comments.push({
					comment:comment.comment,
					user: comment.user.name
				})
			})
		});

		window.Echo.private(`comments.${this.post_id}`)
			.listen('FireMensaje',(e)=>{
				e.comment.user = e.user.name;
				this.comments.push({
					comment: e.comment.comment,
					user: e.user.name
				})
			})
	}
}
</script>