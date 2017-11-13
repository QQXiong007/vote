"use strict";
{
	// particles class
	class Particle {
		constructor(k, i, j) {
			this.k = k;
			this.i = i;
			this.j = j;
			this.init();
			this.x = this.x0;
			this.y = this.y0;
		}
		init() {
			this.x0 = canvas.width * 0.5 + this.i * canvas.width / 250;
			this.y0 = canvas.height * 0.5 + this.j * canvas.height / 250;
		}
		move(img) {
			const dx = pointer.x - this.x;
			const dy = pointer.y - this.y;
			const d = Math.sqrt(dx * dx + dy * dy);
			const s = canvas.size / d;
			this.x += -s * (dx / d) + (this.x0 - this.x) * 0.028;//粒子縮回速度(數字越大,縮回越慢)
			this.y += -s * (dy / d) + (this.y0 - this.y) * 0.028;
			const w = Math.min(20, 2 * s);
			img.position(this.k, this.x - w * 0.5, this.y - w * 0.5, w, w);
		}
	}
	// webGL canvas
	const canvas = {
		init(options) {
			// set webGL context
			this.elem = document.querySelector("canvas");
			const gl = (this.gl =
				this.elem.getContext("webgl", options) ||
				this.elem.getContext("experimental-webgl", options));
			if (!gl) return false;
			// compile shaders
			const vertexShader = gl.createShader(gl.VERTEX_SHADER);
			gl.shaderSource(
				vertexShader,
				`
					precision highp float;
					attribute vec2 aPosition;
					attribute vec2 aTexcoord;
					uniform vec2 uResolution;
					varying vec2 vTexcoord;
					void main() {
						gl_Position = vec4(((aPosition / uResolution * 2.0) - 1.0) * vec2(1, -1), 0, 1);
						vTexcoord = aTexcoord;
					}
      	`
			);
			gl.compileShader(vertexShader);
			const fragmentShader = gl.createShader(gl.FRAGMENT_SHADER);
			gl.shaderSource(
				fragmentShader,
				`
					precision highp float;
					uniform sampler2D texture;
					varying vec2 vTexcoord;
					void main() {
						gl_FragColor = texture2D(texture, vTexcoord);
					}
				`
			);
			gl.compileShader(fragmentShader);
			const program = (this.program = gl.createProgram());
			gl.attachShader(this.program, vertexShader);
			gl.attachShader(this.program, fragmentShader);
			gl.linkProgram(this.program);
			gl.useProgram(this.program);
			// resolution
			this.uResolution = gl.getUniformLocation(this.program, "uResolution");
			gl.enableVertexAttribArray(this.uResolution);
			// canvas resize
			this.resize();
			window.addEventListener("resize", () => this.resize(), false);
			return gl;
		},
		createImages(src, n) {
			return new this.Images(this, src, n);
		},
		Images: class {
			constructor(canvas, src, n) {
				this.n = n;
				const gl = (this.gl = canvas.gl);
				this.program = canvas.program;
				// create POT textures
				this.texture = gl.createTexture();
				gl.bindTexture(gl.TEXTURE_2D, this.texture);
				gl.texImage2D(gl.TEXTURE_2D, 0, gl.RGBA, gl.RGBA, gl.UNSIGNED_BYTE, src);
				gl.generateMipmap(gl.TEXTURE_2D);
				// textures coordinates buffer
				this.aTexcoord = gl.getAttribLocation(this.program, "aTexcoord");
				gl.enableVertexAttribArray(this.aTexcoord);
				gl.vertexAttribPointer(this.aTexcoord, 2, gl.FLOAT, false, 0, 0);
				const texArray = [];
				for (let i = 0; i < n; i++)
					texArray.push(0, 0, 0, 1, 1, 0, 1, 0, 0, 1, 1, 1);
				this.texBuffer = gl.createBuffer();
				gl.bindBuffer(gl.ARRAY_BUFFER, this.texBuffer);
				gl.bufferData(gl.ARRAY_BUFFER, new Float32Array(texArray), gl.STATIC_DRAW);
				// positions buffer
				this.aPosition = gl.getAttribLocation(this.program, "aPosition");
				gl.enableVertexAttribArray(this.aPosition);
				this.positionBuffer = gl.createBuffer();
				this.posArray = new Float32Array(n * 12);
			}
			// update quad position
			position(i, x, y, w, h) {
				const p = i * 12;
				this.posArray[p + 0] = x;
				this.posArray[p + 1] = y;
				this.posArray[p + 2] = x;
				this.posArray[p + 3] = y + h;
				this.posArray[p + 4] = x + w;
				this.posArray[p + 5] = y;
				this.posArray[p + 6] = x + w;
				this.posArray[p + 7] = y;
				this.posArray[p + 8] = x;
				this.posArray[p + 9] = y + h;
				this.posArray[p + 10] = x + w;
				this.posArray[p + 11] = y + h;
			}
			// draw all images in one call
			drawImages() {
				this.gl.bindBuffer(this.gl.ARRAY_BUFFER, this.texBuffer);
				this.gl.vertexAttribPointer(this.aTexcoord, 2, this.gl.FLOAT, false, 0, 0);
				this.gl.bindTexture(this.gl.TEXTURE_2D, this.texture);
				this.gl.bindBuffer(this.gl.ARRAY_BUFFER, this.positionBuffer);
				this.gl.bufferData(
					this.gl.ARRAY_BUFFER,
					this.posArray,
					this.gl.DYNAMIC_DRAW
				);
				this.gl.vertexAttribPointer(this.aPosition, 2, this.gl.FLOAT, false, 0, 0);
				this.gl.drawArrays(this.gl.TRIANGLES, 0, 6 * this.n);
			}
		},
		resize() {
			this.width = this.elem.width = this.elem.offsetWidth;
			this.height = this.elem.height = this.elem.offsetHeight;
			this.size = Math.min(this.width, this.height) * 2;
			for (const p of particles) p.init();
			this.gl.uniform2f(this.uResolution, this.width, this.height);
			this.gl.viewport(
				0,
				0,
				this.gl.drawingBufferWidth,
				this.gl.drawingBufferHeight
			);
		}
	};
	const pointer = {
		init(canvas) {
			this.x = 0.1 + canvas.width * 0.5;
			this.y = canvas.height * 0.5;
			this.s = 0;
			["mousemove", "touchmove"].forEach((event, touch) => {
				document.addEventListener(
					event,
					e => {
						if (touch) {
							e.preventDefault();
							this.x = e.targetTouches[0].clientX;
							this.y = e.targetTouches[0].clientY;
						} else {
							this.x = e.clientX;
							this.y = e.clientY;
						}
					},
					false
				);
			});
		}
	};
	// draw disks (ctx.fillStyle可改顏色 , hsl(顏色,顏色鮮明度,顏色亮暗))
	const shape = n => {
		const shape = document.createElement("canvas");
		shape.width = shape.height = 256;
		const ctx = shape.getContext("2d");
		ctx.fillStyle = "hsl(300, 100%, 30%)";
		ctx.arc(128, 128, 128, 0, 2 * Math.PI);
		ctx.fill();
		return canvas.createImages(shape, n);
	};
	// init webGL canvas
	const particles = [];
	const gl = canvas.init({
		alpha: false,
		stencil: false,
		antialias: true,
		depth: false
	});
	// additive blending "lighter"
	gl.blendFunc(gl.ONE, gl.ONE);
	gl.enable(gl.BLEND);
	// init pointer
	pointer.init(canvas);
	// init particles(迴圈範圍改變粒子圖的長寬 , 長:j , 寬:i)
	let nParticles = 0;
	for (let i = -200; i < 120; i++) {
		for (let j = -50; j < 50; j++) {
			particles.push(new Particle(nParticles++, i, j));
		}
	}
	// init texture
	const particleTexture = shape(nParticles);
	// main animation loop
	const run = () => {
		requestAnimationFrame(run);
		// update particles
		for (const p of particles) p.move(particleTexture);
		// draw images
		particleTexture.drawImages();
	};
	requestAnimationFrame(run);
}