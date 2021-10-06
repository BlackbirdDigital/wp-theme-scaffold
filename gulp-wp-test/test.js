module.exports = {
	task: (gulp, {}, registry) => {

		return function test(done) {
			console.log('hello world');
			done();
		}
	}
}
